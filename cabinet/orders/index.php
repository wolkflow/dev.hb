<? require ($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php") ?>
<? $APPLICATION->SetTitle("HolyBean"); ?>

<main>
    <?  // Спсиок заказов.
        $APPLICATION->IncludeComponent(
			"bitrix:sale.personal.order.list",
			"orders",
			array(
		        "STATUS_COLOR_N" => "green",
                "STATUS_COLOR_P" => "yellow",
                "STATUS_COLOR_F" => "gray",
                "STATUS_COLOR_PSEUDO_CANCELLED" => "red",
                "PATH_TO_DETAIL" => "",
                "PATH_TO_COPY" => "",
                "PATH_TO_CANCEL" => "",
                "PATH_TO_BASKET" => "",
                "ORDERS_PER_PAGE" => 10000,
                "SET_TITLE" => "Y",
                "SAVE_IN_SESSION" => "N",
                "NAV_TEMPLATE" => "",
                "CACHE_TYPE" => "A",
                "CACHE_TIME" => "3600",
                "CACHE_GROUPS" => "Y",
                "HISTORIC_STATUSES" => "F",
                "ACTIVE_DATE_FORMAT" => "d.m.Y"
    		)
		);
	?>	
</main>

<? require ($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php") ?>