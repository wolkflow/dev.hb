<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<? $this->setFrameMode(true); ?>
<div class="container">
    <section class="page-header center">
        <img class="page-header__img" src="/i.php?src=<?= $arResult['DETAIL_PICTURE']['SRC'] ?>&w=550&h=516" />
        <h1 class="page-header__title">
            <?= $arResult['NAME'] ?>
        </h1>
        <p class="page-header__text">
            <?= $arResult['PREVIEW_TEXT'] ?>
        </p>
    </section>
    <div class="cross cross-right">
        <div class="cross-line"></div>
        <div class="cross-image"></div>
    </div>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-12 col-xs-12 col-md-offset-1">
			<section class="page-content center">
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<article class="page-content__article">
							<?= $arResult['DETAIL_TEXT'] ?>
						</article>
					</div>
				</div>
				<? if (!empty($arResult['PROPERTIES']['VIDEO']['VALUE'])) { ?>
					<article class="page-content__video">
						<iframe 
							src="<?= $arResult['PROPERTIES']['VIDEO']['VALUE'] ?>" 
							width="950" 
							height="529"
							frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen
						></iframe>
					</article>
				<? } ?>
			</section>
		</div>
	</div>
</div>