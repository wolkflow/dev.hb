        <footer class="siteFooter">
            <div class="bg2"></div>
            <div id="js-footer-id" class="container4 hei9 bg1">
                <div class="row">                          
                    <div class="col-lg-9 col-md-9 col-sm-9 foo1">
                        <div class="menu footerMenu fo1">
                            <ul>
                                <li><a href="/cook/">о нас</a></li>
                                <li><a href="/#section-programs" class="to-anchor">программы питания</a></li>
                                <li><a href="/catalog/">holymarket</a></li>
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
                                    <i class="icon-12 icon-fb"></i>
                                </a>
                                <a href="javascript:void(0)">
                                    <i class="icon-12 icon-inst"></i>
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
            
            <div id="js-basket-button-wrapper-id">
                <?	// Кнопка корзина.
                    $APPLICATION->IncludeComponent(
                        "bitrix:sale.basket.basket",
                        "button",
                        array()		
                    );
                ?>
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
            
    
            <script src="<?= SITE_TEMPLATE_PATH ?>/js/slick.min.js"></script>
            <script src="<?= SITE_TEMPLATE_PATH ?>/js/script.js"></script>
        </footer>
    </body>
</html>