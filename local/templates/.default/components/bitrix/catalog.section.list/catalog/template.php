<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<? $this->setFrameMode(true); ?>
<div class="bg4">
</div>
<div class="container">
    <div class="row">
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
</div>