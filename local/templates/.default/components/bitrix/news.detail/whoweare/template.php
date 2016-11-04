<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<? $this->setFrameMode(true); ?>
<div class="poz1">
    <div class="container main-unit hei6 hei10">
        <div class="row">
            <div class="col-sm-7">
                <div class="main-who__text">
                    <h2><?= $arResult['NAME'] ?></h2>
                    <p>
                        <?= $arResult['PREVIEW_TEXT'] ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="poz2">
    <div class="main-who_images">
        
        <? if (!empty($arResult['PREVIEW_PICTURE']['SRC'])) { ?>
            <img class="main-who__smallimg" src="/i.php?src=<?= $arResult['PREVIEW_PICTURE']['SRC'] ?>&w=220&h=143" />
        <? } ?>
        <? if (!empty($arResult['DETAIL_PICTURE']['SRC'])) { ?>
            <img class="main-who__bigimg" src="/i.php?src=<?= $arResult['DETAIL_PICTURE']['SRC'] ?>&w=320&h=479" />
        <? } ?>
        </div>
    </div>
</div>
    
