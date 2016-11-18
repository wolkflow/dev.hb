<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<? $this->setFrameMode(true); ?>

<div class="bg11"></div>
<div class="container3 bg1 animated slideInRight hei14">
    <div class="container main-unit-2">
        <div class="row">
            <div class="categories__list center hei12">
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
    </div>
</div>