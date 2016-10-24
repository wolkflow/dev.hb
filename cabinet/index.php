<? require ($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php") ?>
<? $APPLICATION->SetTitle("HolyBean"); ?>

<main>
    <?  // Профиль.
        $APPLICATION->IncludeComponent(
			"bitrix:main.profile",
			"profile",
			array(
		        "USER_PROPERTY_NAME" => "",
		        "SET_TITLE" => "N",
		        "AJAX_MODE" => "N",
		        "USER_PROPERTY" => array(
		        	"UF_NEWSLETTER",
		        ), 
		        "SEND_INFO" => "N",
		        "CHECK_RIGHTS" => "Y",
		        "AJAX_OPTION_JUMP" => "N",
		        "AJAX_OPTION_STYLE" => "N",
		        "AJAX_OPTION_HISTORY" => "N"
    		)
		);
	?>	
</main>

<? require ($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php") ?>