<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<? $this->setFrameMode(true); ?>

<script>
    $(document).ready(function() {
    
        // Изменение количества.
        $(document).on('click', '.js-quantity-change', function() {
            var $wrap = $(this).closest('.js-quantity-wrap');
            var basket = $wrap.data('basket');
            var quantity = $wrap.find('input').val();
            
            $.ajax({
                url: '/remote/',
                type: 'post',
                data: {'action': 'quantity-cart', 'basket': basket, 'quantity': parseInt(quantity)},
                dataType: 'json',
                success: function(response) {
                    if (response.status) {
                        $('#js-basket-total-price-id').html(response.data['total']);
                    }
                }
            });
        });
       
        // Удаление товара.
        $(document).on('click', '.js-basket-remove', function() {
            var $that = $(this);
            var $wrap = $that.closest('.js-quantity-wrap');
            var basket = $that.data('basket');

            $.ajax({
                url: '/remote/',
                type: 'post',
                data: {'action': 'remove-from-cart', 'basket': basket},
                dataType: 'json',
                success: function(response) {
                    if (response.status) {
                        $that.closest('.basket-item').remove();
                        
                        if ($('#js-baskets-id .basket-item').length <= 0) {
                            $('#js-basket-wrap-id').append('<p>Корзина пуста</p>');
                        } else {
                            $('#js-basket-total-price-id').html(response.data['total']);
                        }
                    }
                }
            });
        });
    });
</script>

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
        <button data-remote="order" class="popup-opener-remote basket-button">Оформить заказ</button>
    <? } else { ?>
        <p>Корзина пуста</p>
    <? } ?>
</div>