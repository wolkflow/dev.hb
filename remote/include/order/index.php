<? require ($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php"); ?>

<? if (!CUser::IsAuthorized()) { ?>
    <h2>Оформление заказа</h2>
    <p class="zakaz-text">
        Для оформления заказа в нашем магазине вы должны быть авторизованы в системе. 
        Войдите, используя ваш логин и пароль, или зарегистрируйтесь, если вы еще не совершали покупок в HOLYBEAN.
    </p>
    <div class="zakaz-buttons">
        <a href="javascript:void(0)" class="button popup-opener-remote" data-remote="authorize-order">войти</a>
        <a href="javascript:void(0)" class="button popup-opener-remote" data-remote="register-order">зарегистрироваться</a>
        <a href="javascript:void(0)" class="button popup-opener-remote button-white" data-remote="basket">вернуться в корзину</a>
        
        <? /*
        <a href="javascript:void(0)" data-link="authorize-popup" data-selector="#js-basket-popup-content-id" class="js-link-remote button">войти</a>
        <a href="javascript:void(0)" data-link="register-popup" data-selector="#js-basket-popup-content-id" class="js-link-remote button">зарегистрироваться</a>
        <a href="javascript:void(0)" data-link="basket" data-selector="#js-basket-popup-content-id" class="js-link-remote button-white">вернуться в корзину</a>
        */ ?>
    </div>
<? } else { ?>
    <?  // Заказ.
        $APPLICATION->IncludeComponent(
            "bitrix:sale.basket.basket",
            "order",
            array()		
        );
    ?>
<? } ?>