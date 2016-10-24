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
        $payment = $collect->getItemById(DELYVERY_SYSTEM_DEFAULT);
        $params  = \Bitrix\Sale\PaySystem\Manager::getById($payment->getPaymentSystemId());
        $service = new \Bitrix\Sale\PaySystem\Service($params);

        ob_start();
        $service->initiatePay($payment);
        $link = ob_get_clean();
        
        return $link;
    }
}