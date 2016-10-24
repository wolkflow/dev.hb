<? require ($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php") ?>
<? $APPLICATION->SetTitle("Программы - HolyBean"); ?>

<?
    /*
    $APPLICATION->IncludeComponent(
        "bitrix:sale.order.payment",
        "",
        array()
    );
    */
?>


<?  // Сортировка и фильтрация.
    $sort  = 'CATALOG_PRICE_' . PRICE_TYPE_DEFAULT;
    $order = 'desc';
    
    if (!empty($_REQUEST['order'])) {
        $order = strtolower((string) $_REQUEST['order']);
        if (!in_array($order, array('asc', 'desc'))) {
            $order = 'desc';
        }
    }
    
    if (!empty($_REQUEST['type'])) {
        $GLOBALS['arProductsFilter'] = array('PROPERTY_PROGRAM' => intval($_REQUEST['type']));
    }
?>
<main>
    <?	// Программа.
        $APPLICATION->IncludeComponent(
            "bitrix:catalog.section",
            "catalog",
            array(
                "AJAX_MODE" => "N",
                "SEF_MODE" => "N",
                "IBLOCK_TYPE" => "products",
                "IBLOCK_ID" => "1",
                "SECTION_ID" => "",
                "SECTION_CODE" => $_REQUEST['SECTION'],
                "SECTION_USER_FIELDS" => array(),
                "ELEMENT_SORT_FIELD" => $sort,
                "ELEMENT_SORT_ORDER" => $order,
                "ELEMENT_SORT_FIELD2" => "SORT",
                "ELEMENT_SORT_ORDER2" => "ASC",
                "FILTER_NAME" => "arProductsFilter",
                "INCLUDE_SUBSECTIONS" => "Y",
                "SHOW_ALL_WO_SECTION" => "Y",
                "SECTION_URL" => "",
                "DETAIL_URL" => "",
                "BASKET_URL" => "",
                "ACTION_VARIABLE" => "action",
                "PRODUCT_ID_VARIABLE" => "id",
                "PRODUCT_QUANTITY_VARIABLE" => "quantity",
                "ADD_PROPERTIES_TO_BASKET" => "Y",
                "PRODUCT_PROPS_VARIABLE" => "prop",
                "PARTIAL_PRODUCT_PROPERTIES" => "N",
                "SECTION_ID_VARIABLE" => "SECTION_ID",
                "ADD_SECTIONS_CHAIN" => "Y",
                "DISPLAY_COMPARE" => "N",
                "SET_TITLE" => "Y",
                "SET_BROWSER_TITLE" => "Y",
                "BROWSER_TITLE" => "-",
                "SET_META_KEYWORDS" => "Y",
                "META_KEYWORDS" => "",
                "SET_META_DESCRIPTION" => "N",
                "META_DESCRIPTION" => "",
                "SET_LAST_MODIFIED" => "N",
                "USE_MAIN_ELEMENT_SECTION" => "N",
                "SET_STATUS_404" => "N",
                "PAGE_ELEMENT_COUNT" => "10000",
                "LINE_ELEMENT_COUNT" => "",
                "PROPERTY_CODE" => array(),
                "PRICE_CODE" => array("BASE"),
                "USE_PRICE_COUNT" => "N",
                "SHOW_PRICE_COUNT" => "1",
                "PRICE_VAT_INCLUDE" => "N",
                "PRODUCT_PROPERTIES" => array(
                    "PROTEINS",
                    "FATS",
                    "CARBOHYDRATES"
                ),
                "USE_PRODUCT_QUANTITY" => "Y",
                "CACHE_TYPE" => "A",
                "CACHE_TIME" => "36000000",
                "CACHE_FILTER" => "Y",
                "CACHE_GROUPS" => "Y",
                "DISPLAY_TOP_PAGER" => "N",
                "DISPLAY_BOTTOM_PAGER" => "Y",
                "PAGER_TITLE" => "Товары",
                "PAGER_SHOW_ALWAYS" => "Y",
                "PAGER_TEMPLATE" => "",
                "PAGER_DESC_NUMBERING" => "N",
                "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                "PAGER_SHOW_ALL" => "N",
                "HIDE_NOT_AVAILABLE" => "N",
                "OFFERS_CART_PROPERTIES" => array(),
                "AJAX_OPTION_JUMP" => "N",
                "AJAX_OPTION_STYLE" => "N",
                "AJAX_OPTION_HISTORY" => "N",
                "CONVERT_CURRENCY" => "Y",
                "CURRENCY_ID" => "RUB",
                "ADD_TO_BASKET_ACTION" => "ADD",
                "PAGER_BASE_LINK_ENABLE" => "N",
                "SET_STATUS_404" => "N",
                "SHOW_404" => "N",
                "MESSAGE_404" => "",
                "DISABLE_INIT_JS_IN_COMPONENT" => "N",
                "PAGER_BASE_LINK" => "",
                "PAGER_PARAMS_NAME" => "arrPager"
            )
        );
    ?>
</main>

<? require ($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php") ?>