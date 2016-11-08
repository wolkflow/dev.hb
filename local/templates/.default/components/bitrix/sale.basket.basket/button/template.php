<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<? use Glyf\Core\Helpers\Text as TextHelper ?>

<? $this->setFrameMode(true); ?>

<? if (!empty($arResult['ITEMS']['AnDelCanBuy'])) { ?>
    <div id="js-basket-button-id" class="basket-popup-button popup-opener-remote" data-remote="basket">
        корзина: 
        <span>
            <?= TextHelper::decofnum(count($arResult['ITEMS']['AnDelCanBuy']), array('покупка', 'покупки', 'покупок'), true) ?>
        </span>
    </div>
<? } ?>
