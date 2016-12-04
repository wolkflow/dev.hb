<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><? $APPLICATION->ShowTitle() ?></title>
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		
        <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
		<script src="<?= SITE_TEMPLATE_PATH ?>/js/jquery-ui.min.js"></script>
        <script src="<?= SITE_TEMPLATE_PATH ?>/js/bootstrap.js"></script>
        <script src="<?= SITE_TEMPLATE_PATH ?>/js/jquery.tabslideout.js"></script>    
        <script src="<?= SITE_TEMPLATE_PATH ?>/js/jquery.maskedinput.js"></script>
        <script src="<?= SITE_TEMPLATE_PATH ?>/js/slick.min.js"></script>
        
        
        <? $APPLICATION->ShowHead() ?>
        
        <? /*
        <link rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/css/bootstrap.css" type="text/css" />
        */ ?>
        <link rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/css/jquery-ui.min.css" type="text/css" />
        <link rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/css/animate.css" type="text/css" />
	    <link rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/css/template.css" type="text/css" />
        <? /* <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" /> */ ?>
    </head>
    <body>
		<div id="panel">
			<? $APPLICATION->ShowPanel() ?>
		</div>
		<div class="wrapper">
            
        
			<header class="siteHeader">
				<div class="container">
					<div class="row">
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
							<div class="logo">
								<a href="/">
									<img src="<?= SITE_TEMPLATE_PATH ?>/images/logo.png">
								</a>
							</div>
						</div>
						<div class="col-xs-6 col-sm-5 col-md-6 col-lg-6">
							<div class="headerCenter">
								<div class="headerCenter-phone visible-xs">
									<span class="headerContacts-phone">
										<?  // Телефон.
										$APPLICATION->IncludeComponent('bitrix:main.include', '', array(
											'AREA_FILE_SHOW' => 'file',
											'PATH' => SITE_TEMPLATE_PATH.'/include/data/phone.php',
											'EDIT_TEMPLATE' => 'html',
										));
										?>
									</span>
								</div>
								<nav class="menu hidden-xs">
									<ul>
										<li>
                                            <a id="js-menu-link-about-id" href="javascript:void(0)">о нас</a>
                                            <? /*
											<ul>
												<li><a href="/cook/">Шеф-повар</a></li>
												<li><a href="/idea/">Идеология</a></li>
												<li><a href="/order/">Как сделать заказ</a></li>
												<li><a href="/partners/">Наши партнёры</a></li>
												<li><a href="/contacts/">Контакты</a></li>
											</ul>
                                            */ ?>
										</li>
                                        <? if (strpos($APPLICATION->GetCurPage(false), '/programs/') === false) { ?>
                                            <li><a id="js-menu-link-programs-id" href="javascript:void(0)">программы питания</a></li>
                                        <? } else { ?>
                                            <li><a href="javascript:void(0)">программы питания</a></li>
                                        <? } ?>
										<li><a href="/catalog/">holymarket</a></li>
									</ul>
								</nav>
								<div class="headerAction hidden-xs">
									<? if (!CUser::IsAuthorized()) { ?>
										<a href="javascript:void(0)" class="popup-opener-remote" data-remote="register">Регистрация</a> /
										<a href="javascript:void(0)" class="popup-opener-remote" data-remote="authorize">Авторизация</a>
									<? } else { ?>
										<a href="/cabinet/">Личный кабинет</a> /
										<a href="<?= $APPLICATION->GetCurPageParam('logout=yes', array('logout'), false) ?>">Выход</a>
									<? } ?>
								</div>
							</div>
						</div>
                        
						<div class="col-xs-3 col-sm-3 col-md-2 col-lg-2 hidden-xs">
							<div class="headerContacts pull-right">
								<span class="headerContacts-phone">
									<?  // Телефон.
									$APPLICATION->IncludeComponent('bitrix:main.include', '', array(
										'AREA_FILE_SHOW' => 'file',
										'PATH' => SITE_TEMPLATE_PATH.'/include/data/phone.php',
										'EDIT_TEMPLATE' => 'html',
									));
									?>
								</span>
								<div class="headerContacts-links">
									<ul>
                                        <li><a href="javascript:void(0)"><i class="icon-12 icon-fb"></i></a></li>
										<li><a href="javascript:void(0)"><i class="icon-12 icon-inst"></i></a></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-xs-2 visible-xs">
							<div class="menuTrigger js-menu-toggle"><span></span></div>
						</div>
						<div class="mobileNav">
							<div class="mobileNavInner">
								<div class="mobileNav-close js-menu-toggle"></div>
								<ul class="mobileNavMenu">
									<li><a href="javascript:void(0)">О нас</a>
										<ul>
											<li><a href="/cook/">Шеф-повар</a></li>
                                            <li><a href="/idea/">Идеология</a></li>
                                            <li><a href="/order/">Как сделать заказ</a></li>
                                            <li><a href="/partners/">Наши партнёры</a></li>
                                            <li><a href="/contacts/">Контакты</a></li>
										</ul>
									</li>
									<li><a href="/#programs">программы питания</a></li>
                                    <li><a href="/catalog/">holymarket</a></li>
								</ul>
								<ul class="mobileNavActions">
									<? if (!CUser::IsAuthorized()) { ?>
										<li><a href="javascript:void(0)" class="popup-opener-remote" data-remote="register">Регистрация</a></li>
										<li><a href="javascript:void(0)" class="popup-opener-remote" data-remote="authorize">Авторизация</a></li>
									<? } else { ?>
										<li><a href="/cabinet/">Личный кабинет</a></li>
										<li><a href="<?= $APPLICATION->GetCurPageParam('logout=yes', array('logout'), false) ?>">Выход</a></li>
									<? } ?>
								</ul>
								<a href="javascript:void(0)" class="btn btn-mobileNav popup-opener" data-popup="#callback-popup">Заказать звонок</a>
								<ul class="mobileNavLinks">
									<li><a href="#"><i class="icon-12 icon-inst"></i></a></li>
									<li><a href="#"><i class="icon-12 icon-fb"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</header>
            
            <div id="js-submenu-holder-id" style="display: none;">
                
            </div>
            
            <div id="js-submenu-about-wrap-id" class="hidden-xs" style="display: none;">
                <div class="submenu bl_catalog_filter clearfix" style="margin-bottom: 40px; margin-top: -30px;">
                    <div class="bg4"></div>
                    <div class="container2 bg1">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12 bg1">
                                <div class="bl_catalog_filter_left">
                                    <ul>
                                        <li><a href="/cook/">Шеф-повар</a></li>
                                        <li><a href="/idea/">Идеология</a></li>
                                        <li><a href="/order/">Как сделать заказ</a></li>
                                        <li><a href="/partners/">Наши партнёры</a></li>
                                        <li><a href="/contacts/">Контакты</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div id="js-submenu-programs-wrap-id" class="hidden-xs" style="display: none;">
                <div class="submenu" style="margin-top: -30px;">
                <?	// Программы питания.
                    $APPLICATION->IncludeComponent(
                        "bitrix:news.list",
                        "programs-inline",
                        array(
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
                        )
                    );
                ?>
                </div>
            </div>