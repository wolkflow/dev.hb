<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<? $this->setFrameMode(true); ?>
<div class="bg4">
</div>
<div class="container ">
    <div class="row">
        <div class="col-sm-7 col-md-7 col-lg-7 bg1">
            <? if (!empty($arResult['SECTIONS'])) { ?>
                <div class="bl_catalog_filter_left">
                    <ul>
                        <? foreach ($arResult['SECTIONS'] as $section) { ?>
                            <li <?= ($section['ID'] == $arParams['SECTION']) ? ('class="active"') : ('') ?>>
                                <a href="<?= $section['SECTION_PAGE_URL'] ?>">
                                    <?= $section['NAME'] ?>
                                </a>
                            </li>
                        <? } ?>
                    </ul>
                </div>
            <? } ?>
        </div>
        <div class="col-sm-5 col-md-5 col-lg-5">
            
        </div>
    </div>
</div>