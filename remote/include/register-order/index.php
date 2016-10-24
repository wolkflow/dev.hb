<?php

require ($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

// Авторизация.
$APPLICATION->IncludeComponent(
	"bitrix:main.register",
	"popup-order",
	array()
);