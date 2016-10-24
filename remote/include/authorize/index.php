<?php

require ($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

// Авторизация.
$APPLICATION->IncludeComponent(
	"bitrix:system.auth.form",
	"popup",
	array(
        "REGISTER_URL" => "",
        "FORGOT_PASSWORD_URL" => "",
        "PROFILE_URL" => "/cabinet/",
        "SHOW_ERRORS" => "Y"
    )
);
