<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<? $this->setFrameMode(true); ?>

<pre>
        <? print_r($arResult) ?>
</pre>

<h2>Оформление заказа</h2>
<? /*
<div class="zakaz-login__head">
    <h3>Регистрация</h3>
</div>
*/ ?>
<p class="zakaz-text zakaz-text-recover">
    Для оформления заказа просмотрите его содержимое и нажмите кнопку «Оплатить»,
    после этого заказ будет создан в системе, и вы будете перенаправлены на странцу оплаты.
</p>
<table class="zakaz-table">
    <tbody>
        <tr>
            <td>ЯГОДЫ ГОДЖИ «NATURE RICH»</td>
            <td>335 кКал</td>
            <td>520 Р</td>
        </tr>
        <tr>
            <td>ЯГОДЫ ГОДЖИ «NATURE RICH»</td>
            <td>335 кКал</td>
            <td>520 Р</td>
        </tr>
        <tr>
            <td>ЯГОДЫ ГОДЖИ «NATURE RICH»</td>
            <td>335 кКал</td>
            <td>520 Р</td>
        </tr>
        <tr>
            <td>ЯГОДЫ ГОДЖИ «NATURE RICH»</td>
            <td>335 кКал</td>
            <td>520 Р</td>
        </tr>
    </tbody>
</table>
<div class="zakaz-login__head zakaz-comments">
    <h3>Комментарии к заказу</h3>
    <span>Заполните, если хотите сообщить любую дополнительную информацию о вашем заказе</span>
</div>
<textarea>В религии в представлении развертывается расхождение и опосредствование раскрытого содержания и самостоятельные формы не только скрепляются вместе в некоторое целое, но и объединяются в простое духовное созерцание и, наконец, возвышаются до мышления, обладающего самосознанием.</textarea>
<div class="zakaz-total">
    <h3>Общая сумма</h3>
    <span class="zakaz-total__sum">12990Р</span>
</div>
<div class="zakaz-pay">
    <span>В сумму заказа включена стоимость доставки по Москве в размере 300 Р</span>
    <a class="button" href="#">оплатить</a>
</div>