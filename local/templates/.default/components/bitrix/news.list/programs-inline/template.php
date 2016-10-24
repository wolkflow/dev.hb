<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<? $this->setFrameMode(true); ?>

<div class="categories">
    <div class="categories__list center">
        <? foreach ($arResult['ITEMS'] as $item) { ?>
            <a href="<?= $item['DETAIL_PAGE_URL'] ?>" class="categories__item <?= ($item['CODE'] == $arParams['CURRENT']) ? ('is-active') : ('') ?>">
                <svg aria-hidden="true">
                    <use xlink:href="<?= SITE_TEMPLATE_PATH ?>/images/icons.svg#<?= $item['PROPERTIES']['CSS']['VALUE'] ?>"></use>
                </svg>
                <?= $item['NAME'] ?>
            </a>
        <? } ?>
    </div>
</div>