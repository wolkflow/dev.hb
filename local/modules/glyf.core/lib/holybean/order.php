<?php 

namespace Glyf\Core\HolyBean;


class Order extends \Glyf\Core\Helpers\SaleOrder
{
	public function getPaymentURL()
    {
        if (!\Bitrix\Main\Loader::includeModule('sale')) {
			return;
		}
        
        $bxorder = \Bitrix\Sale\Order::load($this->getID());
        $collect = $bxorder->getPaymentCollection();
        $payment = $collect->current(); // getItemById($this->getID());
        $params  = \Bitrix\Sale\PaySystem\Manager::getById($payment->getPaymentSystemId());
        $service = new \Bitrix\Sale\PaySystem\Service($params);

        ob_start();
        $service->initiatePay($payment);
        $link = ob_get_clean();
        
        return $link;
    }
    
    
    public static function repeat($id)
    {
        if (!\Bitrix\Main\Loader::includeModule('sale')) {
			return;
		}
        
        if (!\Bitrix\Main\Loader::includeModule('catalog')) {
			return;
		}
        
        // Новая корзина для заказа.
        $cart = array();
        
        // Заказ.
        $order = new self($id);
        
        // Корзины.
        $baskets = $order->getBaskets();
        
        foreach ($baskets as &$basket) {
            $basket['PRODUCT'] = \CCatalogProduct::GetByIDEx($basket['PRODUCT_ID']);
            
            $props = array();
            
            $props []= array(
                'NAME'  => 'Перезаказ',
                'CODE'  => 'REPEAT',
                'VALUE' => $id
            );
            
            // Повтор программы питания.
            if ($basket['PRODUCT']['IBLOCK_CODE'] == 'programs-variants') {
                $time   = strtotime($basket['PROPS']['DATE']['VALUE']);
                $period = intval($basket['PROPS']['PERIOD']['VALUE']);
                
                // День начала доставки.
                $start  = strtotime('+' . MENU_DAYS_OFFSET . 'days');
                
                // Выбранный день.
                $date = strtotime('next ' . date('l', $time));
                
                // Если следующий день по заказу выпадает до ближайшей доставки - продлим на неделю.
                if ($date < $start) {
                    $date += TIME_WEEK;
                }
                
                // Список дней.
                $days = array();
                for ($i = 0; $i < $period; $i++) {
                    $daytime = $date + $i * TIME_DAY;
                    $daydate = date('d/m', $daytime);
                    $dayname = \Glyf\Core\Helpers\Text::i18nday(date('N', $daytime), true);
                    
                    $days []= $daydate . ' ' . $dayname;
                }
                
                
                $props []= array(
                    'NAME'  => 'Количество дней',
                    'CODE'  => 'PERIOD',
                    'VALUE' => $period
                );
                
                $props []= array(
                    'NAME'  => 'Дата доставки',
                    'CODE'  => 'DATE',
                    'VALUE' => date('d.m.Y', $date)
                );
                
                $props []= array(
                    'NAME'  => 'Выбранные дни',
                    'CODE'  => 'DAYS',
                    'VALUE' => implode(', ', $days)
                );
            }
            
            $cart []= array(
                'FUSER_ID'   => \CSaleBasket::GetBasketUserID(),
                'PRODUCT_ID' => $basket['PRODUCT_ID'],
                'NAME'       => $basket['NAME'],
                'PRICE'      => $basket['PRODUCT']['PRICES'][PRICE_TYPE_DEFAULT]['PRICE'],
                'MODULE'     => 'catalog',
                'CURRENCY'   => CURRENCY_DEFAULT,
                'QUANTITY'   => $basket['QUANTITY'],
                'LID'        => SITE_DEFAULT,
                'CAN_BUY'    => 'Y',
                 'PROPS'     => $props,
            );
        }
        
        return true;
    }
}