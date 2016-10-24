<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<? $this->setFrameMode(true); ?>

<div class="main-programs">
    <div class="container">
        <h2>Программы питания</h2>
        <div class="main-programs__blocks">
            <? foreach ($arResult['ITEMS'] as $item) { ?>
                <a href="<?= $item['DETAIL_PAGE_URL'] ?>" class="main-programs__block">
                    <svg aria-hidden="true">
                        <use xlink:href="<?= SITE_TEMPLATE_PATH ?>/images/icons.svg#<?= $item['PROPERTIES']['CSS']['VALUE'] ?>"></use>
                    </svg>
                    <?= $item['NAME'] ?>
                </a>
            <? } ?>
        </div>
    </div>
</div>