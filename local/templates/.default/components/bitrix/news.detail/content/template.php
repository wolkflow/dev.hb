<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<? $this->setFrameMode(true); ?>

<div class="container">
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6">
			<img class="page-header__img" src="/i.php?src=<?= $arResult['DETAIL_PICTURE']['SRC'] ?>" />
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="col-lg-12 col-md-12 hei1">
				<h1 class="page-header__title">
					<?= $arResult['NAME'] ?>
				</h1>
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12 hei2">
				<p class="page-header__text">
					<?= $arResult['PREVIEW_TEXT'] ?>
				</p>
			</div>
		</div>
	</div>
    
	<div class="cross cross-right cross1">
        <div class="cross-line"></div>
        <div class="cross-image"></div>
    </div>
    
    <div class="container main-unit">
        <div class="row">
            <div class="col-sm-7">
                <article class="page-content__article text-unit">
                    <?= $arResult['DETAIL_TEXT'] ?>
                </article>
            </div>
            <div class="col-sm-5"></div>
            <? if (!empty($arResult['PROPERTIES']['VIDEO']['VALUE'])) { ?>
                <div class="col-sm-12 col-xs-12">
                    <article class="page-content__video">
                        <iframe 
                            src="<?= $arResult['PROPERTIES']['VIDEO']['VALUE'] ?>" 
                            frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen
                        ></iframe>
                    </article>
                </div>
            <? } ?>
        </div>
    </div>	
</div>

<!--<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<img class="page-header__img img11" src="/i.php?src=<?= $arResult['DETAIL_PICTURE']['SRC'] ?>&w=290&h=270" />
		</div>
		<div class="col-xs-12 shp1">
			<h1 class="">
				<?= $arResult['NAME'] ?>
			</h1>
		</div>
		<div class="col-xs-12">
			<p class="page-header__text">
				<?= $arResult['PREVIEW_TEXT'] ?>
			</p>
		</div>
	</div>
</div>

<div class="dd1">-->
</div>




