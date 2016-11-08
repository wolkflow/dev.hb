<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<? $this->setFrameMode(true); ?>

<div class="bg12"></div>
<div class="container3 bg1 bg_white animated bounceInRight">
    <div class="categories__list center hei12">
        <? foreach ($arResult['ITEMS'] as $item) { ?>
            <a href="<?= $item['DETAIL_PAGE_URL'] ?>" class="categories__item <?= (in_array($item['ID'], $arParams['CURRENTS'])) ? ('is-active') : ('') ?>">
                <svg aria-hidden="true">
                    <use xlink:href="<?= SITE_TEMPLATE_PATH ?>/images/icons.svg#<?= $item['PROPERTIES']['CSS']['VALUE'] ?>"></use>
                </svg>
                <?= $item['NAME'] ?>
            </a>
        <? } ?>
    </div>
</div>