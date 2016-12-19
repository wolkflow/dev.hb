<?php 

namespace Glyf\Core\HolyBean;

use \Glyf\Core\HolyBean\Program;
use \Glyf\Core\HolyBean\Menu;

class MenuList
{
    const IBLOCK_ID = IBLOCK_MENU_ID;
    const INCEPTION = MENU_INCEPTION;
    
    
    // Программа меню.
    protected $program;
    
    
    public function __construct(Program $program)
    {
        $this->program = $program;
    }
    
    
    public function getProgram()
    {
        return $this->program;
    }
    
    
    /**
     * Количество дней, прошедших от точки отсчета.
     * Берется по модулю количества дней для показа меню.
     */
    public function getInceptionInterval()
    {
        $inception = new \DateTime(MENU_INCEPTION);
        $datetime  = new \DateTime(date('Y-m-d'));
        
        $days = (int) $inception->diff($datetime)->format('%a');
        $days = $days % MENU_DAYS;
        
        return $days;
    }
    
    
    /**
     * Список элементов меню.
     *
     * ! Выбираем только первые дни для меню.
     */
    public function getDayList()
    {
        $list = array();
        
        $section = \CIBlockSection::GetList(
            array('SORT' => 'ASC'), 
            array('IBLOCK_ID' => IBLOCK_MENU_ID, 'UF_PROGRAM' => $this->getProgram()->getID()), 
            false,
            array('ID'), 
            array('nTopCount' => 1)
        )->fetch();
        
        $items = Menu::getList(array(
            'order' => array('SORT' => 'ASC'),
            'filter' => array('ACTIVE' => 'Y', 'SECTION_ID' => $section['ID']),
            'limit'  => MENU_DAYS,
        ), true, null);
        
        $list = $items;
        
        if (empty($list)) {
            return array();
        }
        
        // Если количество дней меню меньше чем заданное.
        while (count($list) < MENU_DAYS) {
            foreach ($items as $item) {
                $list []= clone $item;
                if (count($list) >= MENU_DAYS) {
                    break 2;
                }
            }
        }
        unset($items);
        
        
        // Текущий день недели.
        $weekday = date('N');
        
        // Смещение относительно стартового дня.
        $offset = ($this->getInceptionInterval() + MENU_DAYS_OFFSET) % MENU_DAYS;
        
        // Смещаем элемент массива на текущую дату.
        $list = array_merge(array_slice($list, $offset), array_slice($list, 0, $offset));
        
        
        return $list;
    }
}