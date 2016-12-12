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
                        $wrap.closest('.js-basket-item').find('.js-basket-price').html(response.data['cost']);
                        RefreshBasket();
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
                            $('#js-basket-wrap-id').html('<p>Корзина пуста</p>');
                        } else {
                            $('#js-basket-total-price-id').html(response.data['total']);
                        }
                        RefreshBasket();
                    }
                }
            });
        });
    });
</script>
<div class="container main-unit popup_style_1">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h2>Корзина</h2>
        </div>
    </div>
</div>
<div class="container main-unit popup_style_2">
    <div id="js-basket-wrap-id" class="row">      
        <? if (!empty($arResult['ITEMS']['AnDelCanBuy'])) { ?>
            <div id="js-baskets-id">
                <? $items = $arResult['ITEMS']['AnDelCanBuy']; ?>
                <? foreach ($items as $item) { ?>
                    <? $product = CCatalogProduct::GetByIDEx($item['PRODUCT_ID']) ?>
                    <div class="basket-item js-basket-item"> 
                        <div class="box_close js-basket-remove col-xs-1 col-sm-1 col-md-1 col-lg-1 " data-basket="<?= $item['ID'] ?>">
                            <div class="img_close"></div>
                            <div class="txt_close hidden-xs">удалить</div>
                        </div>
                        
                        <div class="basket-item__image col-sm-2 col-md-2 col-lg-2 xs_padding_0 hidden-xs">
                            <? if (!empty($item['PREVIEW_PICTURE_SRC'])) { ?>
                                <img src="/i.php?src=<?= $item['PREVIEW_PICTURE_SRC'] ?>&w=117&h=117" />
                            <? } ?>
                        </div>
                        <div class="basket-item__content col-sm-9 col-md-9 col-lg-9 xs_padding_0 hidden-xs">
                            <div class="row xs_margin_0">
                                <div class="basket-item__value col-md-4 col-lg-4 col-sm-9">
                                    <?= $item['~NAME'] ?>
                                </div>
                                <div class="basket-item__value col-md-2 col-lg-2 col-sm-3">
                                    <? if ($product['IBLOCK_ID'] == IBLOCK_GOODS_ID) { ?>
                                        <?= $product['PROPERTIES']['ENERGY']['VALUE'] ?> кКал
                                    <? } ?>
                                </div>
                                <div class="basket-item__value js-quantity-wrap col-md-2 col-lg-2 col-sm-6 " data-basket="<?= $item['ID'] ?>">
                                    <div class="basket-item__count-minus js-quantity-change"></div>
                                    <input class="basket-item__count" type="text" value="<?= $item['QUANTITY'] ?> шт" data-quantity="<?= $item['QUANTITY'] ?>" />
                                    <div class="basket-item__count-plus js-quantity-change"></div>
                                </div>
                                <div class="basket-item__value col-md-2 col-lg-2 col-sm-3 xs_padding_0">
                                    <span><?= $item['PRICE'] ?></span> ₽
                                </div>
                                <div class="basket-item__value col-md-2 col-lg-2 col-sm-3 ">
                                    <span class="js-basket-price"><?= $item['PRICE'] * $item['QUANTITY'] ?></span> ₽
                                </div>
                            </div>
                        </div>
                        <div class="hidden-sm hidden-md hidden-lg">
                            <div class="row xs_padding_0">
                                <div class="basket-item__content col-xs-12 xs_padding_0">
                                    <div class="row xs_margin_0">
                                        <div class="basket-item__value col-xs-9 xs_padding_right_0">
                                            <?= $item['~NAME'] ?>
                                        </div>
                                        <div class="basket-item__value col-xs-3 kkal_1 xs_padding_0">
                                            <? if ($product['IBLOCK_ID'] == IBLOCK_GOODS_ID) { ?>
                                                <?= $product['PROPERTIES']['ENERGY']['VALUE'] ?> кКал
                                            <? } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="basket-item__image col-xs-3 xs_padding_0">
                                    <? if (!empty($item['PREVIEW_PICTURE_SRC'])) { ?>
                                        <img src="/i.php?src=<?= $item['PREVIEW_PICTURE_SRC'] ?>&w=117&h=117" />
                                    <? } ?>
                                </div>
                                <div class="basket-item__content col-xs-9 xs_padding_0">
                                    <div class="row xs_margin_0">
                                        <div class="basket-item__value js-quantity-wrap col-xs-8 padding_top_15" data-basket="<?= $item['ID'] ?>">
                                            <div class="basket-item__count-minus js-quantity-change"></div>
                                            <input class="basket-item__count" type="text" value="<?= $item['QUANTITY'] ?> шт" data-quantity="<?= $item['QUANTITY'] ?>" />
                                            <div class="basket-item__count-plus js-quantity-change"></div>
                                        </div>
                                        <div class="basket-item__value col-xs-4 xs_padding_0 padding_top_15">
                                            <span><?= $item['PRICE'] ?></span> ₽
                                        </div>
                                        <div class="basket-item__value col-xs-12 margin_top_8">
                                            <span class="js-basket-price"><?= $item['PRICE'] * $item['QUANTITY'] ?></span> ₽
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <? } ?>
            </div>
            <div class="row sum_box">
                <div class="col-sm-offset-2 col-md-offset-2 col-lg-offset-2 col-xs-12 col-sm-10 col-md-10 col-lg-10">
                    <div class="basket-total">
                        <span>общая сумма</span>
                        <span id="js-basket-total-price-id"><?= $arResult['allSum'] ?> ₽</span>
                    </div>
                </div>
                <div class="col-xs-offset-2 col-sm-offset-2 col-md-offset-2 col-lg-offset-2 col-xs-10 col-sm-10 col-md-10 col-lg-10">
                    <button data-remote="order" class="popup-opener-remote basket-button">Оформить заказ</button>
                </div>   
            </div>
        <? } else { ?>
            <p>Корзина пуста</p>
        <? } ?>            
    </div>
</div>