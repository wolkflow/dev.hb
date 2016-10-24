<? require ($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php"); ?>

<? if (!CUser::IsAuthorized()) { ?>
    <h2>Оформление заказа</h2>
    <p class="zakaz-text">
        Для оформления заказа в нашем магазине вы должны быть авторизованы в системе. 
        Войдите, используя ваш логин и пароль, или зарегистрируйтесь, если вы еще не совершали покупок в HOLYBEAN.
    </p>
    <div class="zakaz-buttons">
        <a href="javascript:void(0)" data-link="authorize-popup" data-selector="#js-basket-popup-content-id" class="js-link-remote button">войти</a>
        <a href="javascript:void(0)" data-link="register-popup" data-selector="#js-basket-popup-content-id" class="js-link-remote button">зарегистрироваться</a>
        <a href="javascript:void(0)" data-link="basket" data-selector="#js-basket-popup-content-id" class="js-link-remote button-white">вернуться в корзину</a>
    </div>
<? } else { ?>
    <?  // Заказ.
        $APPLICATION->IncludeComponent(
            "bitrix:sale.basket.basket",
            "order",
            array()		
        );
        
        
        
        /*
        $APPLICATION->IncludeComponent(
            "bitrix:sale.order.ajax",
            "popup",
            Array(
                "ADDITIONAL_PICT_PROP_8" => "-",
                "ALLOW_AUTO_REGISTER" => "N",
                "ALLOW_NEW_PROFILE" => "Y",
                "ALLOW_USER_PROFILES" => "Y",
                "BASKET_IMAGES_SCALING" => "standard",
                "BASKET_POSITION" => "after",
                "COMPATIBLE_MODE" => "Y",
                "DELIVERIES_PER_PAGE" => "8",
                "DELIVERY_FADE_EXTRA_SERVICES" => "Y",
                "DELIVERY_NO_AJAX" => "Y",
                "DELIVERY_NO_SESSION" => "Y",
                "DELIVERY_TO_PAYSYSTEM" => "d2p",
                "DISABLE_BASKET_REDIRECT" => "N",
                "ONLY_FULL_PAY_FROM_ACCOUNT" => "N",
                "PAY_FROM_ACCOUNT" => "Y",
                "PAY_SYSTEMS_PER_PAGE" => "8",
                "PICKUPS_PER_PAGE" => "5",
                "PRODUCT_COLUMNS_HIDDEN" => array("PROPERTY_MATERIAL"),
                "PRODUCT_COLUMNS_VISIBLE" => array("PREVIEW_PICTURE","PROPS"),
                "PROPS_FADE_LIST_1" => array("17","19"),
                "SEND_NEW_USER_NOTIFY" => "Y",
                "SERVICES_IMAGES_SCALING" => "standard",
                "SET_TITLE" => "Y",
                "SHOW_BASKET_HEADERS" => "N",
                "SHOW_COUPONS_BASKET" => "Y",
                "SHOW_COUPONS_DELIVERY" => "Y",
                "SHOW_COUPONS_PAY_SYSTEM" => "Y",
                "SHOW_DELIVERY_INFO_NAME" => "Y",
                "SHOW_DELIVERY_LIST_NAMES" => "Y",
                "SHOW_DELIVERY_PARENT_NAMES" => "Y",
                "SHOW_MAP_IN_PROPS" => "N",
                "SHOW_NEAREST_PICKUP" => "N",
                "SHOW_ORDER_BUTTON" => "final_step",
                "SHOW_PAY_SYSTEM_INFO_NAME" => "Y",
                "SHOW_PAY_SYSTEM_LIST_NAMES" => "Y",
                "SHOW_STORES_IMAGES" => "Y",
                "SHOW_TOTAL_ORDER_BUTTON" => "Y",
                "SKIP_USELESS_BLOCK" => "Y",
                "TEMPLATE_LOCATION" => "popup",
                "TEMPLATE_THEME" => "site",
                "USE_CUSTOM_ADDITIONAL_MESSAGES" => "N",
                "USE_CUSTOM_ERROR_MESSAGES" => "Y",
                "USE_CUSTOM_MAIN_MESSAGES" => "N",
                "USE_PREPAYMENT" => "N",
                "USE_YM_GOALS" => "N"
            )
        );
        */
    ?>
<? } ?>