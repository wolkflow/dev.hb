<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<? $this->setFrameMode(true); ?>


<div id="carousel" class="carousel slide hei7">
    <div class="container1">
        <ol class="carousel-indicators">
            <? $first = true ?>
            <? foreach ($arResult['ITEMS'] as $i => $item) { ?>
                <li data-target="#carousel" data-slide-to="<?= $i ?>" <?= ($first) ? ('class="active"') : ('') ?>></li>
                <? $first = false ?>
            <? } ?>
        </ol>
    </div>

    <div class="carousel-inner">
        <? $first = true ?>
        <? foreach ($arResult['ITEMS'] as $item) { ?>
            <div class="item <?= ($first) ? ('active') : ('') ?>">
                <img src="/i.php?src=<?= $item['PREVIEW_PICTURE']['SRC'] ?>&w=790&h=516" />
                <div class="carousel-caption container hei8">
                    <div class="row">
                        <div class="col-sm-7 col-md-7 col-lg-7">
                            <div class="carousel_background1"></div>
                            <div class="carousel_content1">
                                <h3><?= $item['NAME'] ?></h3>
                                
                                <p><?= $item['PREVIEW_TEXT'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <? $first = false ?>
        <? } ?>
    </div>
</div>

