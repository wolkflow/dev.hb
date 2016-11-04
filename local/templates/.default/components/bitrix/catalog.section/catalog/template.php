<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<? $this->setFrameMode(true); ?>

<? $order = ($arParams['ELEMENT_SORT_ORDER'] == 'desc') ? ('asc') : ('desc') ?>

<section class="inner-page">
    <div class="bl_catalog_filter clearfix">
        <div class="bg4">
        </div>
        <div class="container2 bg1">
            <div class="row">
                <div class="col-sm-7 col-md-7 col-lg-7 bg1">
                    <?	// Разделы каталога.
                        $APPLICATION->IncludeComponent(
                            "bitrix:catalog.section.list",
                            "catalog",
                            array(
                                "SECTION" => $arResult['ID'],
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
                        <div class="bl_filter_item">
                            <span>Сортировка:</span>
                            <a class="sort <?= $arParams['ELEMENT_SORT_ORDER'] ?>" href="<?= $APPLICATION->GetCurPageParam('order=' . $order, array('order'), false) ?>">
                                Цена
                            </a>
                        </div>
                        <div class="bl_filter_item">
                            <span>Фильтр:</span>
                            <div class="select-cont">
                                <span class="select">Тип питания</span>
                                <input type="hidden" />
                                <div class="select-menu">
                                    <a href="<?= $APPLICATION->GetCurPageParam('', array('type'), false) ?>" class="select-menu__item">
                                        Любой
                                    </a>
                                    <? foreach ($arResult['TYPES'] as $type => $title) { ?>
                                        <a href="<?= $APPLICATION->GetCurPageParam('type=' . $type, array('type'), false) ?>" class="select-menu__item">
                                            <?= $title ?>
                                        </a>
                                    <? } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
    </div>
    <div class="container">
        <? if ($arResult['ID'] > 0) { ?>
            <div class="catalog_header_text">
                <p>
                    <?= $arResult['DESCRIPTION'] ?>
                </p>
            </div>
            <h1><?= $arResult['NAME'] ?></h1>
        <? } else { ?>
            <h1>Holymarket</h1>
        <? } ?>
    </div>

    <div class="container main-unit hei6">
        <div class="row">
            <? if (!empty($arResult['ITEMS'])) { ?>
                <? foreach ($arResult['ITEMS'] as $item) { ?>
                    <div class="bl_product_item col-xs-6 col-sm-4 col-md-4 col-lg-4">
                        <div class="bl_product_item_top">
                            <a href="<?= $item['DETAIL_PAGE_URL'] ?>">
                            <span class="bl_product_item_image">
                                <img src="/i.php?src=<?= $item['PREVIEW_PICTURE']['SRC'] ?>&=143&h=219" />
                                <div class="bl_product_item_descr">
                                    <div class="bl_product_item_descr_tb">
                                        <div class="bl_product_item_descr_td">
                                            <p>ПИЩЕВАЯ ЦЕННОСТЬ <br>(на 100 г)</p>
                                            <ul>
                                                <li><b>Белки:</b>    <?= $item['PROPERTIES']['PROTEINS']['VALUE'] ?> г</li>
                                                <li><b>Жиры:</b>     <?= $item['PROPERTIES']['FATS']['VALUE'] ?> г</li>
                                                <li><b>Углеводы:</b> <?= $item['PROPERTIES']['CARBOHYDRATES']['VALUE'] ?> г</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="bl_product_item__buy js-buy" data-product="<?= $item['ID'] ?>">
                                        Купить
                                    </div>
                                </div>
                            </span>
                            <span class="bl_product_item_price">
                                <?= $item['PRICES']['BASE']['VALUE'] ?>
                                <i class="rub"></i>
                            </span>
                            </a>
                        </div>
                        <div class="bl_product_item_name">
                            <a href="javascript:void(0)">
                                <?= $item['NAME'] ?>
                            </a>
                        </div>
                    </div>
                <? } ?>
            <? } else { ?>
                <p>К сожалению, список товаров пуст</p>
            <? } ?>
        </div>
    </div>

</section>