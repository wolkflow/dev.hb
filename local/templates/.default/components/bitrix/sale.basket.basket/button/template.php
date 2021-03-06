<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<? use Glyf\Core\Helpers\Text as TextHelper ?>

<? $this->setFrameMode(true); ?>

<? if (!empty($arResult['ITEMS']['AnDelCanBuy'])) { ?>
    <?  // Количество товаров.
        $count = 0;
        foreach ($arResult['ITEMS']['AnDelCanBuy'] as $basket) {
            $count += (int) $basket['QUANTITY'];
        }
    ?>
    <div id="js-basket-button-id" class="basket-popup-button popup-opener-remote" data-remote="basket">
        <div class="basket-popup-button-content">
            корзина: 
            <span>
                <?= TextHelper::decofnum($count, array('покупка', 'покупки', 'покупок'), true) ?>
            </span>
        </div>
    </div>
<? } ?>
