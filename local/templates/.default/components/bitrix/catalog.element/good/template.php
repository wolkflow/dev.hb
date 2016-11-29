<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<? $this->setFrameMode(true); ?>

<section class="inner-page center">
    <div class="bl_catalog_filter clearfix hidden-xs">
        <div class="bg4">
        </div>
        <div class="container2 bg1 animated slideInRight">
            <div class="row">
                <div class="col-sm-7 col-md-7 col-lg-7 bg1">
                    <?	// Разделы каталога.
                        $APPLICATION->IncludeComponent(
                            "bitrix:catalog.section.list",
                            "catalog",
                            array(
                                "SECTION" => $arResult['IBLOCK_SECTION_ID'],
                                "VIEW_MODE" => "TEXT",
                                "SHOW_PARENT_NAME" => "N",
                                "IBLOCK_TYPE" => "products",
                                "IBLOCK_ID" => "1",
                                "SECTION_ID" => "",
                                "SECTION_CODE" => "",
                                "SECTION_URL" => "",
                                "COUNT_ELEMENTS" => "Y",
                                "TOP_DEPTH" => "1",
                                "SECTION_FIELDS" => "",
                                "SECTION_USER_FIELDS" => "",
                                "ADD_SECTIONS_CHAIN" => "Y",
                                "CACHE_TYPE" => "A",
                                "CACHE_TIME" => "36000000",
                                "CACHE_NOTES" => "",
                                "CACHE_GROUPS" => "Y"
                            ),
                            $component
                        );
                    ?>
                </div>
                <div class="col-sm-5 col-md-5 col-lg-5 bg1">
                    <div class="bl_catalog_filter_right">
                        <div class="link_back_catalog">
                            <a href="/catalog/">Назад в каталог</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container title_element1">
        <h1><?= $arResult['NAME'] ?></h1>
    </div>
    <div class="container main-unit hei6 hidden-xs">
        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 one_product_price_buy">
                        <span class="one_product_price">
                            <?= $arResult['PRICES']['BASE']['VALUE'] ?> <span class="rub">₽</span>
                        </span>
                        <a href="javascript:void(0)" class="button button_white js-buy" data-product="<?= $arResult['ID'] ?>">Купить</a>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12 one_product_char">
                        <div class="one_product_char_header">ПИЩЕВАЯ ЦЕННОСТЬ <span>(на 100 г)</span></div>
                        <div class="one_product_chars clearfix">
                            <div class="one_product_char_item">
                                <b>Белки</b>
                                <span><?= $arResult['PROPERTIES']['PROTEINS']['VALUE'] ?> г</span>
                            </div>
                            <div class="one_product_char_item">
                                <b>Жиры</b>
                                <span><?= $arResult['PROPERTIES']['FATS']['VALUE'] ?> г</span>
                            </div>
                            <div class="one_product_char_item">
                                <b>Углеводы</b>
                                <span><?= $arResult['PROPERTIES']['CARBOHYDRATES']['VALUE'] ?> г</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <? if (!empty($arResult['PREVIEW_PICTURE']['SRC'])) { ?>
                <div class="col-sm-6 col-md-6 col-lg-6 imege1 js-images">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 imege_height">
                        <img class="js-big-image" src="<?= $arResult['PREVIEW_PICTURE']['SRC'] ?>" />
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 imege1_noactive"></div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 imege1_noactive">
                            <img class="js-min-image" src="/i.php?src=<?= $arResult['PREVIEW_PICTURE']['SRC'] ?>&w=88&h=88" data-src="<?= $arResult['PREVIEW_PICTURE']['SRC'] ?>" />
                        </div>
                        <? foreach ($arResult['PROPERTIES']['IMAGES']['VALUE'] as $fid) { ?>
                            <? $src = CFile::getPath($fid); ?>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 imege1_noactive">
                                <img class="js-min-image" src="/i.php?src=<?= $src ?>&w=88&h=88" data-src="<?= $src ?>" />
                            </div>
                        <? } ?>
                    </div>
                </div>
            <? } ?>

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="one_product_tx">
                <div class="one_product_tx_header">Описание</div>
                <div class="one_product_tx_c">
                    <?= $arResult['PREVIEW_TEXT'] ?>
                </div>
            </div>
            <? if (!empty($arResult['PROPERTIES']['PROGRAM']['VALUE'])) { ?>
                <div class="one_product_tx_header mtop50">Подходит для программы</div>
            <? } ?>
            </div>
        </div>
     </div>
    <div class="container main-unit hei6 hidden-lg hidden-md hidden-sm">
        <div class="row">
            <? if (!empty($arResult['PREVIEW_PICTURE']['SRC'])) { ?>
                <div class="col-xs-12 imege1 image1_bottom js-images">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 imege_height">
                        <img class="js-big-image" src="<?= $arResult['PREVIEW_PICTURE']['SRC'] ?>" />
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 imege1_noactive"></div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 imege1_noactive">
                            <img class="js-min-image" src="/i.php?src=<?= $arResult['PREVIEW_PICTURE']['SRC'] ?>&w=88&h=88" data-src="<?= $arResult['PREVIEW_PICTURE']['SRC'] ?>" />
                        </div>
                        <? foreach ($arResult['PROPERTIES']['IMAGES']['VALUE'] as $fid) { ?>
                            <? $src = CFile::getPath($fid); ?>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 imege1_noactive">
                                <img class="js-min-image" src="/i.php?src=<?= $src ?>&w=88&h=88" data-src="<?= $src ?>" />
                            </div>
                        <? } ?>
                    </div>
                </div>
            <? } ?>
            
            <div class="col-xs-12">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 one_product_price_buy">
                        <span class="one_product_price">
                            <?= $arResult['PRICES']['BASE']['VALUE'] ?> <span class="rub">₽</span>
                        </span>
                        <a href="javascript:void(0)" class="button button_white js-buy" data-product="<?= $arResult['ID'] ?>">Купить</a>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12 one_product_char">
                        <div class="one_product_char_header">ПИЩЕВАЯ ЦЕННОСТЬ <span>(на 100 г)</span></div>
                        <div class="one_product_chars clearfix">
                            <div class="one_product_char_item">
                                <b>Белки</b>
                                <span><?= $arResult['PROPERTIES']['PROTEINS']['VALUE'] ?> г</span>
                            </div>
                            <div class="one_product_char_item">
                                <b>Жиры</b>
                                <span><?= $arResult['PROPERTIES']['FATS']['VALUE'] ?> г</span>
                            </div>
                            <div class="one_product_char_item">
                                <b>Углеводы</b>
                                <span><?= $arResult['PROPERTIES']['CARBOHYDRATES']['VALUE'] ?> г</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="one_product_tx">
                    <div class="one_product_tx_header">Описание</div>
                    <div class="one_product_tx_c">
                        <?= $arResult['PREVIEW_TEXT'] ?>
                    </div>
                </div>
                <? if (!empty($arResult['PROPERTIES']['PROGRAM']['VALUE'])) { ?>
                    <div class="one_product_tx_header mtop50">Подходит для программы</div>
                <? } ?>
            </div>
        </div>
    </div>
     
     <? if (!empty($arResult['PROPERTIES']['PROGRAM']['VALUE'])) { ?>
        <?	// Подходит для рограмм питания.
            $APPLICATION->IncludeComponent(
                "bitrix:news.list",
                "programs-situable",
                array(
                    "CURRENTS" => $arResult['PROPERTIES']['PROGRAM']['VALUE'],
                    "IBLOCK_TYPE" => "products",
                    "IBLOCK_ID" => "2",
                    "NEWS_COUNT" => "10",
                    "SORT_BY1" => "SORT",
                    "SORT_ORDER1" => "ASC",
                    "SORT_BY2" => "ID",
                    "SORT_ORDER2" => "DESC",
                    "FILTER_NAME" => "",
                    "FIELD_CODE" => array(),
                    "PROPERTY_CODE" => array("*"),
                    "PARENT_SECTION_CODE" => "",
                    "CACHE_TYPE" => "A",
                    "CACHE_TIME" => "86400",
                    "CACHE_FILTER" => "Y",
                    "PREVIEW_TRUNCATE_LEN" => "0",
                    "ACTIVE_DATE_FORMAT" => "d.m.Y",
                    "DISPLAY_PANEL" => "N",
                    "SET_TITLE" => "N",
                    "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                    "ADD_SECTIONS_CHAIN" => "N",
                    "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                    "PARENT_SECTION" => "",
                    "DISPLAY_TOP_PAGER"	=> "N",
                    "DISPLAY_BOTTOM_PAGER" => "N",
                    "PAGER_TITLE" => "",
                    "PAGER_SHOW_ALWAYS" => "N",
                    "PAGER_TEMPLATE" => "",
                    "PAGER_DESC_NUMBERING" => "N",
                    "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                    "PAGER_SHOW_ALL" => "N",
                    "DISPLAY_DATE" => "Y",
                    "DISPLAY_NAME" => "Y",
                    "DISPLAY_PICTURE" => "N",
                    "DISPLAY_PREVIEW_TEXT" => "Y"
                ),
                $component
            );
        ?>
    <? } ?>
     
</section>