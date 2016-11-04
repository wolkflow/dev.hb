<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<? $this->setFrameMode(true); ?>

<div class="container main-unit hei6">
    <div class="row">
        <h2>Программы питания</h2>
    </div>
</div>
<div class="bg3">
</div>
<div class="container main-unit">
    <div class="row main-programs__blocks">
        <div class="col-sm-1 col-md-1 col-lg-1">
        </div>
        <div class="col-sm-10 col-md-10 col-lg-10">
            <div class="row">
                <? foreach ($arResult['ITEMS'] as $item) { ?>
                    <a href="<?= $item['DETAIL_PAGE_URL'] ?>" class="main-programs__block col-sm-4 col-md-4 col-lg-4">
                        <svg aria-hidden="true">
                            <use xlink:href="<?= SITE_TEMPLATE_PATH ?>/images/icons.svg#<?= $item['PROPERTIES']['CSS']['VALUE'] ?>"></use>
                        </svg>
                        <?= $item['NAME'] ?>
                    </a>
                <? } ?>
            </div>
        </div>
        <div class="col-sm-1 col-md-1 col-lg-1">
        </div>   
    </div>
</div>