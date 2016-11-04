<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<? $this->setFrameMode(true); ?>

<section> 
    <div class="container">
        <h1>Наши партёры</h1>
    </div>
    <div class="container main-unit">
        <div class="row">
            <div class="center page-content clearfix ots1">
                <? foreach ($arResult['ITEMS'] as $item) { ?>
                    <? $link = $item['PROPERTIES']['LINK']['VALUE'] ?>
                    <div class="bl_partner_item">
                        <a href="<?= ($link) ?: ('javascript:void(0)') ?>" target="_blank">
                            <img src="<?= $item['PREVIEW_PICTURE']['SRC'] ?>" alt="<?= $item['NAME'] ?>" title="<?= $item['NAME'] ?>" />
                        </a>
                    </div>
                <? } ?>
            </div>
        </div>
    </div>
</section>