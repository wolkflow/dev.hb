<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<? $this->setFrameMode(true); ?>

<script>
    $(document).ready(function() {
        $(document).on('click', '#js-make-order-id', function() {
            var comment = $('#js-order-comment-id').data('comment');
            
            $.ajax({
                url: '/remote/',
                type: 'post',
                data: {'action': 'make-order', 'comment': comment},
                dataType: 'json',
                success: function(response) {
                    if (response.status) {
                        RefreshBasket();
                        location.href = response.data['link'];
                    }
                }
            });
        });
    });
</script>

<h2>Оформление заказа</h2>
<p class="zakaz-text zakaz-text-recover">
    Для оформления заказа просмотрите его содержимое и нажмите кнопку «Оплатить»,
    после этого заказ будет создан в системе, и вы будете перенаправлены на странцу оплаты.
</p>
<? if (!empty($arResult['ITEMS']['AnDelCanBuy'])) { ?>
    <table class="zakaz-table">
        <tbody>
            <? $items = $arResult['ITEMS']['AnDelCanBuy']; ?>
            <? foreach ($items as $item) { ?>
                <tr>
                    <td><?= $item['~NAME'] ?></td>
                    <td><?= $item['QUANTITY'] ?></td>
                    <td><?= $item['PRICE'] ?> Р</td>
                </tr>
            <? } ?>
        </tbody>
    </table>
<? } ?>
<div class="zakaz-login__head zakaz-comments">
    <h3>Комментарии к заказу</h3>
    <span>Заполните, если хотите сообщить любую дополнительную информацию о вашем заказе</span>
</div>
<textarea id="js-order-comment-id" name="COMMENT"></textarea>
<div class="zakaz-total">
    <h3>Общая сумма</h3>
    <span class="zakaz-total__sum"><?= ($arResult['allSum'] + $arResult['DELIVERY']['PRICE']) ?> ₽</span>
</div>
<div class="zakaz-pay">
    <span>
        В сумму заказа включена стоимость доставки 
        по Москве в размере <?= $arResult['DELIVERY']['PRICE'] ?> ₽
    </span>
    <a class="button" href="javascript:void(0)" id="js-make-order-id">оплатить</a>
</div>
