<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<? $this->setFrameMode(true); ?>

<div class="submenu menu-programs" style="display: none;">
    <div class="bg3"></div>
    <div class="container main-unit">
        <div class="row main-programs__blocks">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                <div class="row">
                    <? foreach ($arResult['ITEMS'] as $item) { ?>
                        <? $link = ($item['PROPERTIES']['SOON']['VALUE'] == 'Y') ? ('javascript:void(0)') : ($item['DETAIL_PAGE_URL']) ?>
                        <a href="<?= $link ?>" class="main-programs__block col-sm-4 col-md-4 col-lg-4 col-xs-12 <?= ($item['PROPERTIES']['SOON']['VALUE'] == 'Y') ? ('disable') : ('') ?>">
                            <?= $item['PROPERTIES']['SVG']['~VALUE']['TEXT'] ?>
                            <?= $item['NAME'] ?>
                            <? if ($item['PROPERTIES']['SOON']['VALUE'] == 'Y') { ?>
                                <br/><span class="soon">(скоро в продаже)</span>
                            <? } ?>
                        </a>
                    <? } ?>
                </div>
            </div>
            <div class="col-sm-1 col-md-1 col-lg-1">
            </div>   
        </div>
    </div>
</div>