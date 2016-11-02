<? require ($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php") ?>
<? $APPLICATION->SetTitle("HolyBean"); ?>

<main>
    <?	// Шеф-повар.
        $APPLICATION->IncludeComponent(
            "bitrix:news.detail",
            "content",
            array(
                "DISPLAY_DATE" => "Y",
                "DISPLAY_NAME" => "Y",
                "DISPLAY_PICTURE" => "Y",
                "DISPLAY_PREVIEW_TEXT" => "Y",
                "USE_SHARE" => "Y",
                "SHARE_HIDE" => "N",
                "SHARE_TEMPLATE" => "",
                "SHARE_HANDLERS" => array(),
                "SHARE_SHORTEN_URL_LOGIN" => "",
                "SHARE_SHORTEN_URL_KEY" => "",
                "AJAX_MODE" => "N",
                "IBLOCK_TYPE" => "content",
                "IBLOCK_ID" => "5",
                "ELEMENT_ID" => "",
                "ELEMENT_CODE" => "idea",
                "CHECK_DATES" => "Y",
                "FIELD_CODE" => array("PREVIEW_PICTURE"),
                "PROPERTY_CODE" => array("*"),
                "IBLOCK_URL" => "",
                "SET_TITLE" => "Y",
                "SET_BROWSER_TITLE" => "Y",
                "BROWSER_TITLE" => "-",
                "SET_META_KEYWORDS" => "Y",
                "META_KEYWORDS" => "-",
                "SET_META_DESCRIPTION" => "Y",
                "META_DESCRIPTION" => "-",
                "SET_STATUS_404" => "Y",
                "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                "ADD_SECTIONS_CHAIN" => "Y",
                "ADD_ELEMENT_CHAIN" => "Y",
                "ACTIVE_DATE_FORMAT" => "d.m.Y",
                "USE_PERMISSIONS" => "N",
                "GROUP_PERMISSIONS" => array(),
                "CACHE_TYPE" => "A",
                "CACHE_TIME" => "36000000",
                "CACHE_GROUPS" => "Y",
                "DISPLAY_TOP_PAGER" => "N",
                "DISPLAY_BOTTOM_PAGER" => "N",
                "PAGER_TITLE" => "",
                "PAGER_TEMPLATE" => "",
                "PAGER_SHOW_ALL" => "Y",
                "AJAX_OPTION_JUMP" => "N",
                "AJAX_OPTION_STYLE" => "Y",
                "AJAX_OPTION_HISTORY" => "N"
            )
        );
    ?>
	<div class="container main-unit">
		<div class="row page-content__article2">
					<div class="col-sm-12 pad1">
						<h2>Преимущества</h2>
					</div>
					<div class="col-sm-4">
						<a href="#">
							<img src="<?= SITE_TEMPLATE_PATH ?>/images/advan1.jpg" />
							<span>профессиональный подход</span>
						</a>
					</div>
					<div class="col-sm-4">
						<a href="#">
							<img src="<?= SITE_TEMPLATE_PATH ?>/images/advan2.jpg" />
							<span>доставка</span>
						</a>
					</div>
					<div class="col-sm-4">
						<a href="#">
							<img src="<?= SITE_TEMPLATE_PATH ?>/images/advan3.jpg" />
							<span>сбалансированное меню</span>
						</a>
					</div>
					<div class="col-sm-4">
						<a class="idea-advantages__item" href="#">
							<img src="<?= SITE_TEMPLATE_PATH ?>/images/advan4.jpg" />
							<span>разнообразие продуктов/блюд</span>
						</a>
					</div>
					<div class="col-sm-4">
						<a class="idea-advantages__item" href="#">
							<img src="<?= SITE_TEMPLATE_PATH ?>/images/advan5.jpg" />
							<span>экономия вашего времени</span>
						</a>
					</div>
					<div class="col-sm-4">
						<a class="idea-advantages__item" href="#">
							<img src="<?= SITE_TEMPLATE_PATH ?>/images/advan6.jpg" />
							<span>забота об организме</span>
						</a>
					</div>
				
			</div>
		</div>
	</div>
</main>

<? require ($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php") ?>