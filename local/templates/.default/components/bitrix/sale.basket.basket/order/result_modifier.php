<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); 

// ������ ��������.
$arResult['DELIVERY'] = CSaleDelivery::getByID(DELYVERY_SYSTEM_DEFAULT);
