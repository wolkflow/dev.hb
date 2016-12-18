<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<? IncludeComponentTemplateLangFile(__FILE__, $this->GetFolder()) ?>

<? $this->setFrameMode(true); ?>

<? $section = end($arResult['SECTION']['PATH']) ?>

<? if (!empty($arResult['ITEMS'])) { ?>
    <div class="container main-unit">
        <div class="row page-content__article2 idea-images">
            <div class="col-sm-12 pad1">
                <h2><?= $section['DESCRIPTION'] ?></h2>
            </div>
            <? foreach ($arResult['ITEMS'] as $item) { ?>
                <?  // Ссылка.
                    $link = 'javascript:void(0)';
                    if ($item['PROEPRTIES']['TYPE']['XML_ID'] == 'ARTICLE') {
                        $link = $item['DETAIL_PAGE_URL'];
                    } elseif ($item['PROEPRTIES']['TYPE']['XML_ID'] == 'EXTERNAL') {
                        $link = $item['PROEPRTIES']['LINK']['VALUE'];
                    }
                ?>
                <div class="col-sm-4">
                    <a class="idea-advantages__item" href="<?= $link ?>">
                        <? if (!empty($item['PREVIEW_PICTURE']['SRC'])) { ?>
                            <img src="/i.php?src=<?= CFile::getPath($item['PREVIEW_PICTURE']['SRC']) ?>&w=324&h=160" />
                        <? } ?>
                        <span>
                            <?= $item['NAME'] ?>
                        </span>
                    </a>
                </div>
            <? } ?>
        </div>
    </div>
<? } ?>
