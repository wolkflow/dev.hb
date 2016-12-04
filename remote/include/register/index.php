<?php

require ($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

// Авторизация.
$APPLICATION->IncludeComponent(
	"bitrix:main.register",
	"popup",
	array(
        "USER_PROPERTY_NAME" => "",
        "SEF_MODE" => "N",
        "SHOW_FIELDS" => array(
            "NAME",
            "LAST_NAME",
            "LOGIN",
            "EMAIL",
            "PERSONAL_MOBILE",
            "PERSONAL_GENDER",
            "PERSONAL_STREET",
            "UF_NEWSLETTER",
        ),
        "REQUIRED_FIELDS" => array(
            "NAME",
            "LOGIN",
            "EMAIL",
            "PERSONAL_MOBILE",
        ),
        "AUTH" => "Y",
        "USE_BACKURL" => "N",
        "SUCCESS_PAGE" => "", //(!empty($_COOKIE['backurl'])) ? (strval($_COOKIE['backurl'])) :("/"),
        "SET_TITLE" => "N",
        "USER_PROPERTY" => array(),
        "SEF_FOLDER" => "",
        "VARIABLE_ALIASES" => array(),
    )
);