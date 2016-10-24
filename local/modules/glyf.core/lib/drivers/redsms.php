<?php

namespace Glyf\Core\Drivers;

/**
 * Клиент для взаимодействия с SMSC
 */
class RedSMS
{
	CONST LOGIN    = '';;
	CONST PASSWORD = '';;
	CONST APIKEY   = '';
	CONST BASEURL  = 'https://lk.redsms.ru/get/';
	CONST FORMAT   = 'json';
	CONST SENDER   = '';
	CONST CODE	   = '7';
	
	protected static $operations = array(
		'balance' => 'balance.php',
		'send'    => 'send.php',
	);
	
	
	/**
	 * Получение баланса.
	 */
	public function getBalance()
	{
		$operation = self::$operations['balance'];
		
		$data = $this->request($operation);
		
		return (float) $data['money'];
	}

	
	/**
	 * Отпарвка SMS.
	 */
	public function sendSMS($phones, $text)
	{
		$operation = self::$operations['send'];
		
		// Преобразование номеров в ежиный формат.
		$phones = array_map(array(__CLASS__, 'prepare'), (array) $phones);
		
		if (empty($phones)) {
			return false;
		}
		
		$params = array(
			'phone'  => implode(',', $phones),
			'text' 	 => $text,
			'sender' =>  self::SENDER,
		);
		
		$data = $this->request($operation, $params);
	
		if ($data['error'] != 0) {
			throw new Exception('Не удалось отправить SMS.');
		}
		return true;
	}
	
	
	/**
	 * Отправка запроса.
	 */
	protected function request($operation, $params = array())
	{
		$timestamp = file_get_contents('https://lk.redsms.ru/get/timestamp.php');
		
		$params = array_merge((array) $params, array('login' => self::LOGIN, 'timestamp' => $timestamp, 'return' => self::FORMAT));
		
		$url = self::BASEURL.$operation.'?'.http_build_query($params).'&signature='.$this->signature($params);
		
		$ch = curl_init();
		
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_ENCODING, 'utf-8');
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 120);
		curl_setopt($ch, CURLOPT_TIMEOUT, 120);
		curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		
		$response = curl_exec($ch);
		
		if (curl_errno($ch)) {
			throw new Exception('SMS '.curl_error($ch));	
		}
		curl_close($ch);
		
		$data = json_decode($response, true);
		
		return $data;
	}
	
	
	/**
	 * Подпись.
	 */
	protected function signature($params)
	{
		ksort($params);
		reset($params);
		
		return md5(implode($params) . self::APIKEY);
	}
	
	
	/**
	 * Преобразование номера телефона.
	 */
	protected static function prepare($phone)
	{
		$phone = (string) $phone;
		if (!empty($phone)) {
			$phone = trim($phone, ' +');
			$phone = preg_replace('/[^0-9]/', '', $phone);
			if (strlen($phone) > 10) {
				$phone = substr($phone, 1);
			}
			$phone = self::CODE . $phone;
		}
		return $phone;
	}
}