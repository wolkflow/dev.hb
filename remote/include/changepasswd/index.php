<?php

require ($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

// Авторизация.
$APPLICATION->IncludeComponent(
	"bitrix:system.auth.authorize",
	"null",
	array()
);

// Восстановление пароля.
$APPLICATION->IncludeComponent(
	"bitrix:system.auth.changepasswd", 
	"", 
	array(
		"AUTH_RESULT" => $arAuthResult,
		"SHOW_ERRORS" => true,
	)
);