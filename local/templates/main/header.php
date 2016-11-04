<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><? $APPLICATION->ShowTitle() ?></title>
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		
        <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
		<script src="<?= SITE_TEMPLATE_PATH ?>/js/bootstrap.js"></script>
        
        <? $APPLICATION->ShowHead() ?>
        <? /*
        <link rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/css/bootstrap.css" type="text/css" />
        */ ?>
	    <link rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/css/template.css" type="text/css" />
    </head>
    <body>

		<div id="panel">
			<? $APPLICATION->ShowPanel() ?>
		</div>
		<div class="wrapper">
			<header class="siteHeader">
				<div class="container">
					<div class="row">
						<div class="col-xs-4 col-sm-4">
							<div class="logo">
								<a href="/">
									<img src="<?= SITE_TEMPLATE_PATH ?>/images/logo.png">
								</a>
							</div>
						</div>
						<div class="col-xs-5 col-sm-6">
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
										<li><a href="javascript:void(0)">о нас</a>
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
						<div class="col-xs-3 col-sm-2 hidden-xs">
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
										<li><a href="#"><i class="icon-12 icon-inst"></i></a></li>
										<li><a href="#"><i class="icon-12 icon-fb"></i></a></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-xs-3 visible-xs">
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