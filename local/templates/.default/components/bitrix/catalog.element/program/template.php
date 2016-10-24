<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<? $this->setFrameMode(true); ?>

<section class="inner-page">
    <?	// Программы питания.
    $APPLICATION->IncludeComponent(
        "bitrix:news.list",
        "programs-inline",
        array(
            "CURRENT" => $arResult['CODE'],
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

        <div class="container">
            <h1><?= $arResult['NAME'] ?></h1>
        </div>
        <div class="container">
            <div class="bl_ind_cont">
                <div class="row">
                    <div class="col-sm-7">
                        <h2>Описание</h2>
                        <p>
                            <?= $arResult['PREVIEW_TEXT']; ?>
                        </p>
                    </div>
                    <div class="col-sm-5">
                        <? if (!empty($arResult['PREVIEW_PICTURE']['SRC'])) { ?>
                            <img src="/i.php?src=<?= $arResult['PREVIEW_PICTURE']['SRC'] ?>&w=411&h=265" align="right" />
                        <? } ?>
                    </div>
                </div>
            </div>
        </div>

    
    <? if ($arResult['PROPERTIES']['INDIVIDUAL']['VALUE'] == 'Y') { ?>
        <? include ('include/individual.php'); ?>
    <? } else { ?>
        <? include ('include/common.php'); ?>
    <? } ?>
    
</section>