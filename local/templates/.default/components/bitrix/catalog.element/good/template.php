<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<? $this->setFrameMode(true); ?>

<section class="inner-page center">
    <div class="bl_catalog_filter clearfix">
        <div class="bl_catalog_filter_right">
            <div class="link_back_catalog">
                <a href="/catalog/">Назад в каталог</a>
            </div>
        </div>
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
    
    <h1><?= $arResult['NAME'] ?></h1>
    <div class="one_product">
        <div class="one_product_price_buy">
            <span class="one_product_price">
                <?= $arResult['PRICES']['BASE']['VALUE'] ?> Р
            </span>
            <a href="javascript:void(0)" class="button button_white js-buy" data-product="<?= $arResult['ID'] ?>">Купить</a>
        </div>
        <div class="one_product_char">
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
        <div class="one_product_tx">
            <div class="one_product_tx_header">Описание</div>
            <div class="one_product_tx_c">
                <?= $arResult['PREVIEW_TEXT'] ?>
            </div>
        </div>
    </div>
</section>