<?php

define('NO_KEEP_STATISTIC', true);
define('NO_AGENT_STATISTIC', true);
define('NO_AGENT_CHECK', true);
define('DisableEventsCheck', true);

use Bitrix\Main\Application;
use Glyf\Core\System\ProductModel;

require ($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php');

global $USER;

// Ответ в формате JSON.
function jsonresponse($status, $message = '', $data = null, $console = '', $type = 'json')
{
	$result = array(
		'status'  => (bool)   $status,
		'message' => (string) $message,
		'data' 	  => (array)  $data,
		'console' => (string) $console,
	);
	
	header('Content-Type: application/json');
	echo json_encode($result);
	exit();
}

// Получение HTML.
function gethtmlremote($file)
{
	ob_start();
	include (DIR_REMOTE . $file);
	return ob_get_clean();
}

// Текущая цена в корзине.
function getBasketPrice()
{
    $result = CSaleBasket::GetList(array(), array('FUSER_ID' => CSaleBasket::GetBasketUserID(), 'ORDER_ID' => 'NULL'));
    $price  = 0;
    while ($basket = $result->fetch()) {
        $price += floatval($basket['PRICE']) * intval($basket['QUANTITY']);
    }
    return $price;
}



// Запрос.
$request = Application::getInstance()->getContext()->getRequest();

// Действие.
$action = (string) $request->get('action');



// Обработка действий.
switch ($action) {
	/*
     * Добавление товара в корзину.	
	 */
    case ('add-to-cart'):
        $product  = (int)   $request->get('product');
        $quantity = (int)   $request->get('quantity');
        $days     = (array) $request->get('days');
        
        if (!Bitrix\Main\Loader::includeModule('glyf.core')) {
            jsonresponse(false, 'Невозможно добавить товар');
        }
        
        if (!Bitrix\Main\Loader::includeModule('catalog')) {
            jsonresponse(false, 'Невозможно добавить товар');
        }
        
        if (!Bitrix\Main\Loader::includeModule('sale')) {
            jsonresponse(false, 'Невозможно добавить товар');
        }
        
        $product = new ProductModel($product);
        
        $props = array();
        
        if (!empty($days)) {
            $props []= array(
                'NAME'  => 'Выбранные дни',
                'CODE'  => 'DAYS',
                'VALUE' => implode(', ', $days)
            );
        }
        
        $basket = array(
            'FUSER_ID'   => CSaleBasket::GetBasketUserID(),
            'PRODUCT_ID' => $product->getID(),
            'NAME'       => $product->getName(),
            'PRICE'      => $product->getPrice(),
            'MODULE'     => 'catalog',
            'CURRENCY'   => CURRENCY_DEFAULT,
            'QUANTITY'   => $quantity,
            'LID'        => SITE_DEFAULT,
            'CAN_BUY'    => 'Y',
            'PROPS'      => $props
        );
        
        if (!CSaleBasket::Add($basket)) {
            jsonresponse(false, 'Не удалось добавить товар');
        }
        
        $result = CSaleBasket::GetList(array(), array('FUSER_ID' => CSaleBasket::GetBasketUserID(), 'ORDER_ID' => 'NULL'));
        $count  = (int) $result->SelectedRowsCount();
        
        jsonresponse(true, 'Товар успешно добавлен', array('count' => $count));
		break;
    
    
    /*
     * Изменение количества товара в корзине.	
	 */
    case ('quantity-cart'):
        $basket   = (int) $request->get('basket');
        $quantity = (int) $request->get('quantity');
        
        if (!Bitrix\Main\Loader::includeModule('glyf.core')) {
            jsonresponse(false, 'Невозможно изменить количество товара');
        }
        
        if (!Bitrix\Main\Loader::includeModule('sale')) {
            jsonresponse(false, 'Невозможно изменить количество товара');
        }
        
        if (!CSaleBasket::Update($basket, array('QUANTITY' => $quantity))) {
            jsonresponse(false, 'Невозможно изменить количество товара');
        }
        $basket = CSaleBasket::getByID($basket);
        
        jsonresponse(true, 'Количество обновлено', array('price' => floatval($basket['PRICE']), 'total' => getBasketPrice()));
        break;
    
    
    /*
     * Удаление товара из корзины.	
	 */
    case ('remove-from-cart'):
        $basket = (int) $request->get('basket');
        
        if (!Bitrix\Main\Loader::includeModule('glyf.core')) {
            jsonresponse(false, 'Невозможно удалить товар');
        }
        
        if (!Bitrix\Main\Loader::includeModule('sale')) {
            jsonresponse(false, 'Невозможно удалить товар');
        }
        
        if (!CSaleBasket::Delete($basket)) {
            jsonresponse(false, 'Невозможно удалить товар');
        }
        jsonresponse(true, 'Товар успешно удален', array('total' => getBasketPrice()));
        break;
    
    
    /*
     * Создание заказа.
     */
    case ('make-order'):
        $comment = (string) $request->get('comment');
        
        if (!Bitrix\Main\Loader::includeModule('sale')) {
            jsonresponse(false, 'Невозможно создать заказ');
        }
        
        // цена.
        $price = 0;
        
        // Способ доставки.
        $delivery = CSaleDelivery::getByID(DELYVERY_SYSTEM_DEFAULT);
        
        $result = CSaleBasket::GetList(array(), array('FUSER_ID' => CSaleBasket::GetBasketUserID(), 'ORDER_ID' => 'NULL'));
        while ($basket = $result->fetch()) {
            $price += (float) ($basket['PRICE'] * $basket['QUANTITY']);
        }
        $price += (float) $delivery['PRICE'];
        
        // Добавление заказа.
        $orderID = CSaleOrder::Add(array(
            'LID'              => SITE_DEFAULT,
            'PERSON_TYPE_ID'   => PERSON_TYPE_DEFAULT,
            'PAYED'            => 'N',
            'CANCELED'         => 'N',
            'STATUS_ID'        => STATUS_DEFAULT,
            'DISCOUNT_VALUE'   => '',
            'USER_DESCRIPTION' => '',
            'PRICE'            => $price,
            'CURRENCY'         => CURRENCY_DEFAULT,
            'USER_ID'          => CUser::getID(),
            'PAY_SYSTEM_ID'    => PAYSYSTEM_DEFAULT,
            'DELIVERY_ID'      => DELYVERY_SYSTEM_DEFAULT,
            'TAX_VALUE'        => '',
        ));
        
        if ($orderID > 0) {
            // Добавление корзин в заказ.
            CSaleBasket::OrderBasket($orderID, CSaleBasket::GetBasketUserID());
            
            $order = new \Glyf\Core\HolyBean\Order($orderID);
            $link  = $order->getPaymentURL();
            
            jsonresponse(true, 'Заказ создан', array('link' => $link));
        }
        jsonresponse(false, 'При создании заказа возникла ошибка');
        break;
    
    
    /*
     * Получение SMS-кода для регистрации.
	 */
    case ('register-sms-send'):
		$phone = (string) $request->get('phone');
		
		if (empty($phone)) {
			jsonresponse(false, 'Неверно указан номер телефона');
		}
		
		$res = CUser::getList(($b="ID"), ($o="ASC"), array('PERSONAL_MOBILE' => $phone));
		if ($res->SelectedRowsCount() > 0) {
			jsonresponse(false, 'Такой телефон уже зарегистрирован');
		}
		
		if (empty($_SESSION['SMS_CODE']) || $_SESSION['SMS_PHONE'] != $phone) {
			// Случайный 6-хзначный код.
			$_SESSION['SMS_CODE'] = substr(str_shuffle('0123456789'), 0, 6);
		}
		$_SESSION['SMS_PHONE'] = $phone;
		
		// Удаление флага успешной проверки кода.
		unset($_SESSION['SMS_CONFIRM']);
		
        // file_put_contents($_SERVER['DOCUMENT_ROOT'].'/sms.log', date('d.m.Y H:i:s').PHP_EOL.$_SESSION['SMS_CODE'].PHP_EOL, FILE_APPEND);
        
		// Отправка смс с кодом подтверждения.
		$smsclient = new Glyf\Core\Drivers\SMSC();
		try {
			$smsclient->sendSMS($_SESSION['SMS_PHONE'], 'Ваш код для подтверждения регистрации '.$_SESSION['SMS_CODE']);
		} catch (Exception $e) {
			//jsonresponse(false, $e->getMessage());
		}
        
		jsonresponse(true, 'На ваш телефон отправлено sms с кодом подтверждения');
		break;
    
    
    /* 
     * Проверка SMS-кода для регистрации.
     */
	case ('register-sms-check'):
        $code = (string) $request->get('code');
		
		if (empty($_SESSION['SMS_CODE'])) {
			jsonresponse(false, 'Код не отправлен либо устарел');
		}
		
		if (empty($code)) {
			jsonresponse(false, 'Не указан код');
		}
		
		if ($code !== $_SESSION['SMS_CODE']) {
			jsonresponse(false, 'Неверный код');
		}
		
		// Установка флага успешной проверки кода.
		$_SESSION['SMS_CONFIRM'] = true;
		
		jsonresponse(true);
		break;
    
    
    /**
     * Восстановление пароля.
     */
    case ('restore-password'):
        $phone = (string) $request->get('phone');
        
        if (empty($phone)) {
            jsonresponse(false, 'Телефон не указан');
        }
        
        $password = randString(6, array(
            'abcdefghijklnmopqrstuvwxyz',
            'ABCDEFGHIJKLNMOPQRSTUVWXYZ',
            '0123456789',
        ));
        
        $res = CUser::getList(($b="ID"), ($o="ASC"), array('PERSONAL_MOBILE' => $phone));
		if (!($user = $res->fetch())) {
			jsonresponse(false, 'Телефон не найден');
		}
        
        // Отправка смс с кодом подтверждения.
		$smsclient = new Glyf\Core\Drivers\SMSC();
		try {
			$smsclient->sendSMS($phone, 'Ваш новый пароль: '.$password);
		} catch (Exception $e) {
			//jsonresponse(false, $e->getMessage());
		}
        
        $cuser = new CUser();
        $cuser->Update($user['ID'], array('PASSWORD' => $password));
        
		jsonresponse(true, 'На ваш телефон отправлен новый пароль. Обязательно поменяйте пароль после авторизации.');
        break;
    
    
	default:
		jsonresponse(false, '', array(), 'Неверный запрос');
		break;
}
