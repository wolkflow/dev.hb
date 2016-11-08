<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<? $this->setFrameMode(true); ?>

<section class="inner-page center">
    <div class="bl_catalog_filter clearfix">
        <div class="bg4">
        </div>
        <div class="container2 bg1 animated bounceInRight">
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
    <div class="container main-unit hei6">
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 one_product_price_buy">
                        <span class="one_product_price">
                            <?= $arResult['PRICES']['BASE']['VALUE'] ?> Р
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
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 imege1">
                <img src="http://ua.badgood.info/photos/notes/1/72/71027/568269f831.jpg">
            </div>
            
                <div class="one_product_tx">
                    <div class="one_product_tx_header">Описание</div>
                    <div class="one_product_tx_c">
                        <?= $arResult['PREVIEW_TEXT'] ?>
                    </div>
                </div>
        </div>
    </div>
    
</section>