<div id="basket-popup" class="popup">
    <div class="popup-container">
        <div class="popup-close">закрыть</div>
        <div class="popup-content" id="js-basket-popup-content-id">
            <?	// Корзина.
                $APPLICATION->IncludeComponent(
                    "bitrix:sale.basket.basket",
                    "popup",
                    array()		
                );
            ?>
        </div>
    </div>
</div>