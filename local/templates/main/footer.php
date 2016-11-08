            <footer class="siteFooter">
				<div class="bg2"></div>
                <div class="container2 hei9 bg1">
					<div class="row">                          
                        <div class="col-lg-9 col-md-9 col-sm-9 foo1">
                            <div class="menu footerMenu">
                                <ul>
                                    <li><a href="/about/">о нас</a></li>
                                    <li><a href="/#programs">программы питания</a></li>
                                    <li><a href="/catalog/">holymarket</a></li>
                                    <li><a href="#" class="popup-opener" data-popup="#basket-popup">корзина</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3">
                            <div class="footer-contacts">
                                <div class="footer-contacts__tel">
                                    <?  // Телефон.
                                        $APPLICATION->IncludeComponent('bitrix:main.include', '', array(
                                            'AREA_FILE_SHOW' => 'file',
                                            'PATH' => SITE_TEMPLATE_PATH.'/include/data/phone.php',
                                            'EDIT_TEMPLATE' => 'html',
                                        ));
                                    ?>
                                </div>
                                <div class="footer-contacts__soc hidden-xs">
                                    <a href="javascript:void(0)">
                                        <i class="icon-12 icon-inst"></i>
                                    </a>
                                    <a href="javascript:void(0)">
                                        <i class="icon-12 icon-fb"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row footer-top">
                        <div class="col-lg-3 col-md-3 col-sm-3 foo1">
                            <div class="footer-info__copyright">
                                <span>
                                    <?  // Copyright.
                                        $APPLICATION->IncludeComponent('bitrix:main.include', '', array(
                                            'AREA_FILE_SHOW' => 'file',
                                            'PATH' => SITE_TEMPLATE_PATH.'/include/data/copyright.php',
                                            'EDIT_TEMPLATE' => 'html',
                                        ));
                                    ?>
                                </span>
                                <span>
                                    <?  // Разработка.
                                        $APPLICATION->IncludeComponent('bitrix:main.include', '', array(
                                            'AREA_FILE_SHOW' => 'file',
                                            'PATH' => SITE_TEMPLATE_PATH.'/include/data/development.php',
                                            'EDIT_TEMPLATE' => 'html',
                                        ));
                                    ?>
                                </span>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="footer-info__copyright footer-info2">
                                <span>
                                    <?  // Оферта.
                                        $APPLICATION->IncludeComponent('bitrix:main.include', '', array(
                                            'AREA_FILE_SHOW' => 'file',
                                            'PATH' => SITE_TEMPLATE_PATH.'/include/data/offer.php',
                                            'EDIT_TEMPLATE' => 'html',
                                        ));
                                    ?>
                                </span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3">
                            <div class="footer-info__copyright footer-info3">
                                <span>
                                    <?  // E-mail.
                                        $APPLICATION->IncludeComponent('bitrix:main.include', '', array(
                                            'AREA_FILE_SHOW' => 'file',
                                            'PATH' => SITE_TEMPLATE_PATH.'/include/data/email.php',
                                            'EDIT_TEMPLATE' => 'html',
                                        ));
                                    ?>
                                </span>
                            </div>
                        </div>
					</div>
				</div>
                
                <?  // Popup.
                    $APPLICATION->IncludeComponent('bitrix:main.include', '', array(
                        'AREA_FILE_SHOW' => 'file',
                        'PATH' => SITE_TEMPLATE_PATH.'/include/area/popup.php',
                        'EDIT_TEMPLATE' => 'html',
                    ));
                ?>
                
                <?  // Callback.
                    $APPLICATION->IncludeComponent('bitrix:main.include', '', array(
                        'AREA_FILE_SHOW' => 'file',
                        'PATH' => SITE_TEMPLATE_PATH.'/include/area/callback.php',
                        'EDIT_TEMPLATE' => 'html',
                    ));
                ?>
                    
                <a id="js-callback-popup-id" class="popup-opener callback-trigger" href="javascript:void(0)" data-popup="#callback-popup"></a>
                
            <?/*
            <div id="callback-popup" class="popup">
    <div class="popup-container popup-container-right">
        <div class="popup-close">закрыть</div>
        <div class="popup-content">
            


<h2>Обратный звонок</h2>
<p class="zakaz-text">
    Если у вас есть вопросы, оставьте свой номер телефона, 
    и мы перезвоним вам в любое удобное время.
</p>

<form class="form" method="post" id="js-form-mail-callback-id">
    <input type="hidden" name="BACKCALL" value="BACKCALL">
    <div class="form-row">
        <span class="label big">Имя</span>
        <div class="input">
            <input type="text" name="NAME" value="">
        </div>
    </div>
    <div class="form-row">
        <span class="label big">Телефон</span>
        <div class="input">
            <input type="text" name="PHONE" value="">
        </div>
    </div>
    <div class="form-row">
        <span class="label big">Сообщение</span>
        <div class="input">
            <textarea name="MESSAGE"></textarea>
        </div>
    </div>
    <div class="form-row">
        <span class="label big">Удобное время</span>
        <div class="input">
            <label class="radio">
                <input type="radio" name="TIME" value="09:00-12:00">
                <span>09:00-12:00</span>
            </label>
            <label class="radio">
                <input type="radio" name="TIME" value="12:00-15:00">
                <span>12:00-15:00</span>
            </label>
            <label class="radio">
                <input type="radio" name="TIME" value="15:00-18:00">
                <span>15:00-18:00</span>
            </label>
            <label class="radio">
                <input type="radio" name="TIME" value="любое">
                <span>любое</span>
            </label>
        </div>
    </div>
    <div class="form-row form-row-buttons">
        <span class="label big"></span>
        <div class="input">
            <button>Отправить</button>
        </div>
    </div>
</form>        </div>
    </div>
</div>
						
					*/ ?>
			
        <button class="button popup-opener-remote" data-remote="basket">корзина</button>
                    
        
        <script src="<?= SITE_TEMPLATE_PATH ?>/js/slick.min.js"></script>
        <script src="<?= SITE_TEMPLATE_PATH ?>/js/script.js"></script>
    </body>
</html>