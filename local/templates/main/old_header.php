<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><? $APPLICATION->ShowTitle() ?></title>
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		
        <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
		
        <? $APPLICATION->ShowHead() ?>
    </head>
    <body>

		<div id="panel">
			<? $APPLICATION->ShowPanel() ?>
		</div>
		<div class="wrapper">
        <header class="siteHeader">
            <div class="header-content center">
                <a class="header-logo" href="/">
					<img src="<?= SITE_TEMPLATE_PATH ?>/images/logo.png" />
				</a>
                <div class="header-menu">
                    <nav class="menu">
                        <ul>
                            <li><a href="/about/">о нас</a></li>
                            <li><a href="/#programs">программы питания</a></li>
                            <li><a href="/catalog/">holymarket</a></li>
                        </ul>
                    </nav>
                    <div class="header-auth">
                        <? if (!CUser::IsAuthorized()) { ?>
                            <a href="javascript:void(0)" class="popup-opener-remote" data-remote="register">Регистрация</a> /
                            <a href="javascript:void(0)" class="popup-opener-remote" data-remote="authorize">Авторизация</a>
                        <? } else { ?>
                            <a href="/cabinet/">Личный кабинет</a> / 
                            <a href="<?= $APPLICATION->GetCurPageParam('logout=yes', array('logout'), false) ?>">Выход</a>
                        <? } ?>
                    </div>
                </div>
                <div class="header-contacts">
                    <div class="header-contacts__tel">
						<?  // Телефон.
							$APPLICATION->IncludeComponent('bitrix:main.include', '', array(
								'AREA_FILE_SHOW' => 'file',
								'PATH' => SITE_TEMPLATE_PATH.'/include/data/phone.php',
								'EDIT_TEMPLATE' => 'html',
							));
						?>
					</div>
                    <div class="header-contacts__soc">
                        <a href="#">
                            Facebook
                            <svg aria-hidden="true">
                                <use xlink:href="images/icons.svg#facebook"></use>
                            </svg>
                        </a>
                        <a href="#">
                            Instagram
                            <svg aria-hidden="true">
                                <use xlink:href="images/icons.svg#instagram"></use>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </header>