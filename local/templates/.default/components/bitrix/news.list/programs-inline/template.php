<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<? $this->setFrameMode(true); ?>
<? // animated slideInRight ?>
<div class="bg11 hidden-xs"></div>
<div class="container3 bg1 hei14 hidden-xs">
    <div class="container main-unit-2">
        <div class="row">
            <div class="categories__list center hei12">
                <? foreach ($arResult['ITEMS'] as $item) { ?>
                    <? $link = ($item['PROPERTIES']['SOON']['VALUE'] == 'Y') ? ('javascript:void(0)') : ($item['DETAIL_PAGE_URL']) ?>
                    <a href="<?= $link ?>" class="categories__item <?= ($item['CODE'] == $arParams['CURRENT']) ? ('is-active') : ('') ?>  <?= ($item['PROPERTIES']['SOON']['VALUE'] == 'Y') ? ('disable') : ('') ?>">
                        <?= $item['PROPERTIES']['SVG']['~VALUE']['TEXT'] ?>
                        <?= $item['NAME'] ?>
                        <? if ($item['PROPERTIES']['SOON']['VALUE'] == 'Y') { ?>
                            <br/><span class="soon">(скоро в продаже)</span>
                        <? } ?>
                    </a>
                <? } ?>
            </div>
        </div>
    </div>
</div>