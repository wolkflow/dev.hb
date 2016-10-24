<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<? $this->setFrameMode(true); ?>

<section class="page-header center">
    <img class="page-header__img" src="/i.php?src=<?= $arResult['DETAIL_PICTURE']['SRC'] ?>&w=550&h=516" />
    <h1 class="page-header__title">
        <?= $arResult['NAME'] ?>
    </h1>
    <p class="page-header__text">
        <?= $arResult['PREVIEW_TEXT'] ?>
    </p>
</section>
<section class="page-content center">
    <article class="page-content__article">
        <?= $arResult['DETAIL_TEXT'] ?>
    </article>
    <? if (!empty($arResult['PROPERTIES']['VIDEO']['VALUE'])) { ?>
        <article class="page-content__video">
            <iframe 
                src="<?= $arResult['PROPERTIES']['VIDEO']['VALUE'] ?>" 
                width="940" 
                height="529" 
                frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen
            ></iframe>
        </article>
    <? } ?>
</section>