<? require ($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php"); ?>

<?	// Кнопка корзина.
    $APPLICATION->IncludeComponent(
        "bitrix:sale.basket.basket",
        "button",
        array()		
    );
?>