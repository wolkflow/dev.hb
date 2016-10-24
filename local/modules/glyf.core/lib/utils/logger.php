<?php

namespace Glyf\Core;


/**
 * Класс для логирования.
 */
class Logger
{
    // Уровни отладки, порядок важен: от самого строгого.
    const DEBUG_LEVEL_NONE      = __LINE__;
    const DEBUG_LEVEL_ERROR     = __LINE__;
    const DEBUG_LEVEL_NOTIFY    = __LINE__;
    const DEBUG_LEVEL_LOG       = __LINE__;
    const DESTRUCT_STRING       = '==========';

    const KEY_MSG   = 'message';
    const KEY_TIME  = 'time';
    const KEY_TYPE  = 'type';

    const LINE_TYPE_FINISH = 'finish';

    private $DEBUG_LEVELS = [
        self::DEBUG_LEVEL_ERROR,
        self::DEBUG_LEVEL_NOTIFY,
        self::DEBUG_LEVEL_LOG,
    ];

    private $dirname = null;
    private $handle  = null;

    private $debug_level = self::DEBUG_LEVEL_NONE;
    private $filename    = null;

    /**
     * Конструктор класса.
     *
     * @param string    $filename       Имя файла, в котором будут храниться логи.
     * @param int       $debug_level    Уровень логирования
     * @param string    $dir_name       Путь к директории, в которой будет храниться файл логов
     */
    public function __construct($filename, $debug_level = null, $dir_name = '')
    {
        $this->dirname = $_SERVER['DOCUMENT_ROOT'] . '../logs/';

        if (!empty($dir_name)) {
            if (strpos($dir_name, '/') === 0) {
                // Если задан абсолютный путь, то будем использовать его
                $this->dirname = $dir_name;
            } else {
                // Если задан относительный путь, то будем отсчитывать его от директории по умолчанию
                $this->dirname .= $dir_name;
            }
        }

        // Для корректной работы путь должен начинаться и кончаться слешами
        $this->dirname = '/' . trim($this->dirname, '/') . '/';

        if (!file_exists($this->dirname)) {
            mkdir($this->dirname, 0777, true);
        }

        $this->filename = $filename;
        $this->handle = fopen($this->dirname . $filename, 'a+');
        $this->setDebugLevel($debug_level);
    }
    

    /**
     *  Установка уровня отладки.
     */
    public function setDebugLevel($level)
    {
        if (in_array($level, $this->DEBUG_LEVELS)) {
            $this->debug_level = $level;
        }
    }

    /**
     *  Запись в лог файл. Уровнень записи DEBUG_LEVEL_LOG.
     */
    public function log($string)
    {
        $string = $this->prepareLogValue($string);
        $this->add('LOG: ' . $string, self::DEBUG_LEVEL_LOG);
    }

    
    /**
     *  Запись в лог файл. Уровнень записи DEBUG_LEVEL_NOTIFY.
     *  @param  string  $string
     */
    public function notify($string)
    {
        $string = $this->prepareLogValue($string);
        $this->add('NOTIFY: ' . $string, self::DEBUG_LEVEL_NOTIFY);
    }

    
    /**
     *  Запись в лог файл. Уровнень записи DEBUG_LEVEL_ERROR.
     *  @param  string  $string
     */
    public function error($string)
    {
        $string = $this->prepareLogValue($string);
        $this->add('ERROR: ' . $string, self::DEBUG_LEVEL_ERROR);
    }

    
    /**
     * Логирование исключения
     *
     * @param \Exception $exception
     */
    public function exceptionToError(\Exception $exception)
    {
        $data = $this->convertExceptionToArray($exception);

        if ($exception->getPrevious() instanceof \Exception) {
            $data['Previous'] = $this->convertExceptionToArray($exception->getPrevious());
        }

        $this->error($data);
    }

    /**
     * Конвертация исключения в массив
     *
     * @param \Exception $exception
     * @return array
     */
    protected function convertExceptionToArray(\Exception $exception)
    {
        return array(
            'File' => $exception->getFile() . ':' . $exception->getLine(),
            'Message' => $exception->getMessage(),
            'Trace' => $exception->getTraceAsString()
        );
    }
    

    /**
     *  Запись в лог файл.
     *  @param  string          $string
     *  @param  DEBUG_LEVEL_*   $level
     */
    private function add($string, $level)
    {
        if ($this->debug_level >= $level) {
            fwrite($this->handle, date('Y-m-d H:i:s') . ' ' . $string . PHP_EOL);
        }
    }

    /**
     *  Очистка содержимого лог-файла.
     */
    public function clear()
    {
        ftruncate($this->handle, 0);
    }
    

    /**
     *  Приведение логируемого значения к строке
     *  @param  mixed   $string
     *  @return string
     */
    private function prepareLogValue($string)
    {
        if (is_string($string)) {
            return $string;
        } else {
            return var_export($string, 1);
        }
    }

    
    /**
     *  Деструктор класса.
     */
    public function __destruct()
    {
        $this->add(self::DESTRUCT_STRING . PHP_EOL, self::DEBUG_LEVEL_ERROR);
        fclose($this->handle);
    }


    /**
     * Переводит указатель в начало текущего файла лога
     *
     * @return bool
     */
    public function startReading()
    {
        return rewind($this->handle);
    }


    /**
     * Считывает строку из файла лога и парсит её на части.
     *
     * @return array|false
     */
    public function readLineToArray()
    {
        $s = fgets($this->handle);
        if ($s === false) {
            return false;
        }
        $line = explode(' ', rtrim($s, PHP_EOL));
        $date = array_shift($line);
        $result = [
            'date'          => strtotime($date),
            self::KEY_TIME  => strtotime($date . ' ' . array_shift($line)),
        ];
        if ($line[0] == self::DESTRUCT_STRING) {
            $result[self::KEY_TYPE] = self::LINE_TYPE_FINISH;
            // Следующая строка пустая, пропустим её
            fgets($this->handle);
        } else {
            $result[self::KEY_TYPE] = 'line';
            $result['level']        = rtrim(array_shift($line), ':');
            $result[self::KEY_MSG]  = implode(' ' , $line);
        }
        return $result;
    }

    /**
     * Расширенное логирование
     *
     * @param $text
     * @param $data
     */
    public function extendLog($text, $data)
    {
        $log_data  = $text . PHP_EOL;
        $log_data .= 'URI: ' . $_SERVER['REQUEST_URI'] . PHP_EOL;
        $log_data .= 'Параметры: ' . print_r($_REQUEST, true) . PHP_EOL;
        $log_data .= 'Пользователь: ' . \CUser::GetID() . PHP_EOL;
        $log_data .= 'Данные: ' . print_r($data, true);
        
        $this->log($log_data);
    }

    /**
     * @return null|string
     */
    public function getFilename()
    {
        return $this->filename;
    }
}
