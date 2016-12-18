<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<? $this->setFrameMode(true); ?>

<div id="section-programs" class="container main-unit hei26">
    <div class="row pt1">
        <h2>Программы питания</h2>
    </div>
</div>
<div class="bg3"></div>
<div class="container main-unit">
    <div class="row main-programs__blocks">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
            <div class="row">
                <? foreach ($arResult['ITEMS'] as $item) { ?>
                    <? $link = ($item['PROPERTIES']['SOON']['VALUE'] == 'Y') ? ('javascript:void(0)') : ($item['DETAIL_PAGE_URL']) ?>
                    <a href="<?= $link ?>" class="main-programs__block col-sm-4 col-md-4 col-lg-4 col-xs-12 <?= ($item['PROPERTIES']['SOON']['VALUE'] == 'Y') ? ('disable') : ('') ?>">
                        <?= $item['PROPERTIES']['SVG']['~VALUE']['TEXT'] ?>
                        <? /*
                        <svg aria-hidden="true">
                            <use xlink:href="<?= SITE_TEMPLATE_PATH ?>/images/icons.svg#<?= $item['PROPERTIES']['CSS']['VALUE'] ?>"></use>
                        </svg>
                        
                        <svg version="1.1" id="<?= $item['CODE'] ?>" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                             width="76px" height="55px" viewBox="0 0 76 55" enable-background="new 0 0 76 55" xml:space="preserve">
                            <polyline fill="none" stroke="#000000" stroke-linecap="round" stroke-miterlimit="10" points="46.13,26.054 53.827,10.618 
                                73.69,4.48 74.575,7.347 55.938,13.105 48.09,28.847 "/>
                            <path fill="none" stroke="#64B357" stroke-miterlimit="10" d="M11.18,39.247C5.686,37.63,1.675,32.55,1.675,26.534
                                c0-7.318,5.932-13.25,13.25-13.25c6.956,0,12.66,5.36,13.207,12.174"/>
                            <path fill="none" stroke="#64B357" stroke-miterlimit="10" d="M6.479,19.157c-1.569,1.795-2.57,4.092-2.739,6.619h9.358
                                L6.479,19.157z M14.168,24.707v-9.358c-2.528,0.169-4.824,1.171-6.619,2.739L14.168,24.707z M15.681,15.349v9.358l6.619-6.619
                                C20.505,16.52,18.209,15.518,15.681,15.349z M3.74,27.29c0.169,2.529,1.171,4.824,2.739,6.619l6.619-6.619H3.74z M16.949,29.628
                                l-1.268-1.268v5.875 M18.991,27.29h-2.24l1.071,1.07 M14.168,35.214V28.36l-6.619,6.619c1.304,1.139,2.873,1.979,4.603,2.418
                                 M26.109,25.776c-0.169-2.527-1.171-4.824-2.74-6.619l-6.618,6.619H26.109z"/>
                            <path fill="none" stroke="#000000" stroke-linecap="square" stroke-miterlimit="10" d="M49.497,34.415
                                c-0.133-6.885-5.745-12.427-12.66-12.427c-4.42,0-8.306,2.265-10.574,5.694c-1.059-0.766-2.357-1.223-3.765-1.223
                                c-3.555,0-6.438,2.883-6.438,6.438c0,0.377,0.039,0.744,0.102,1.105c-3.306,1.49-5.611,4.805-5.611,8.668
                                c0,5.252,4.258,9.51,9.51,9.51h27.935c4.943,0,8.951-4.008,8.951-8.951C56.947,38.8,53.724,35.13,49.497,34.415z"/>
                            <path fill="none" stroke="#000000" stroke-linecap="square" stroke-miterlimit="10" d="M16.18,37.831
                                c0.048-0.039,0.096-0.076,0.144-0.113"/>
                            <path fill="none" stroke="#000000" stroke-linecap="square" stroke-miterlimit="10" d="M15.271,46.618
                                c-0.887-1.074-1.42-2.449-1.42-3.947c0-1.213,0.357-2.371,0.99-3.354"/>
                            <path fill="none" stroke="#000000" stroke-linecap="square" stroke-miterlimit="10" d="M26.099,27.56
                                c1.713,1.156,2.839,3.115,2.839,5.338"/>
                            <path fill="none" stroke="#000000" stroke-linecap="square" stroke-miterlimit="10" d="M50.398,34.604
                                c-0.764-0.211-1.57-0.326-2.402-0.326h-2.035"/>
                        </svg>
                        */ ?>

                        <?= $item['NAME'] ?>
                        <? if ($item['PROPERTIES']['SOON']['VALUE'] == 'Y') { ?>
                            <br/><span class="soon">(скоро в продаже)</span>
                        <? } ?>
                    </a>
                <? } ?>
            </div>
        </div>
        <div class="col-sm-1 col-md-1 col-lg-1">
        </div>   
    </div>
</div>