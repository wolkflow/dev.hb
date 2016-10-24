<? require ($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php"); ?>

<?	// Корзина.
    $APPLICATION->IncludeComponent(
        "bitrix:sale.basket.basket",
        "popup",
        array()		
    );
?>