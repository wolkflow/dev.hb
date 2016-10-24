<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<? $this->setFrameMode(true); ?>

<div class="sliderArea">
    <div id="sliderDots"></div>
    <div class="slider" id="homeSlider">
        <? foreach ($arResult['ITEMS'] as $item) { ?>
            <div>
                <div class="container">
                    <div class="sliderText">
                        <div class="sliderTitle">
                            <?= $item['NAME'] ?>
                        </div>
                        <p>
                            <?= $item['PREVIEW_TEXT'] ?>
                        </p>
                    </div>
                    <div class="sliderImage">
                        <img src="/i.php?src=<?= $item['PREVIEW_PICTURE']['SRC'] ?>&w=856&h=803" />
                    </div>
                </div>
            </div>
        <? } ?>
    </div>
</div>