<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<? $this->setFrameMode(true); ?>

 <section class="inner-page center">
    <h1>Наши партёры</h1>
    <div class="center page-content clearfix">
        <? foreach ($arResult['ITEMS'] as $item) { ?>
            <div class="bl_partner_item">
                <img src="<?= $item['PREVIEW_PICTURE']['SRC'] ?>" alt="<?= $item['NAME'] ?>" title="<?= $item['NAME'] ?>" />
            </div>
        <? } ?>
    </div>
</section>