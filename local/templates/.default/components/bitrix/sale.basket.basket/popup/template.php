<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<? $this->setFrameMode(true); ?>

<h2>Корзина</h2>
<div id="js-basket-wrap-id">
    <? if (!empty($arResult['ITEMS']['AnDelCanBuy'])) { ?>
        <div id="js-baskets-id" class="basket-list">
            <? $items = $arResult['ITEMS']['AnDelCanBuy']; ?>
            <? foreach ($items as $item) { ?>
                <div class="basket-item">
                    <div class="basket-item__remove js-basket-remove" data-basket="<?= $item['ID'] ?>">удалить</div>
                    <div class="basket-item__image">
                        <? if (!empty($item['PREVIEW_PICTURE_SRC'])) { ?>
                            <img src="/i.php?src=<?= $item['PREVIEW_PICTURE_SRC'] ?>&w=117&h=117" />
                        <? } ?>
                    </div>
                    <div class="basket-item__content">
                        <div class="basket-item__value">
                            <?= $item['NAME'] ?>
                        </div>
                        <div class="basket-item__value">
                            <?= $item['QUANTITY'] ?>
                        </div>
                        <div class="basket-item__value js-quantity-wrap" data-basket="<?= $item['ID'] ?>">
                            <div class="basket-item__count-minus js-quantity-change"></div>
                            <input class="basket-item__count" type="text" value="<?= $item['QUANTITY'] ?> шт" data-quantity="<?= $item['QUANTITY'] ?>" />
                            <div class="basket-item__count-plus js-quantity-change"></div>
                        </div>
                        <div class="basket-item__value">
                            <span class="js-basket=price"><?= $item['PRICE'] ?></span> Р
                        </div>
                    </div>
                </div>
            <? } ?>
        </div>
        <div class="basket-total">
            <span>общая сумма</span>
            <span id="js-basket-total-price-id"><?= $arResult['allSum'] ?></span>
        </div>
        <button data-link="order" data-selector="#js-basket-popup-content-id" class="js-link-remote basket-button">Оформить заказ</button>
    <? } else { ?>
        <p>Корзина пуста</p>
    <? } ?>
</div>