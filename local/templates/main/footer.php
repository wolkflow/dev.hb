            <footer class="siteFooter">
                <div class="container">
                    <div class="footer-content center">
                        <div class="footerTop clearfix">
                            <div class="menu footerMenu">
                                <ul>
                                    <li><a href="/about/">о нас</a></li>
                                    <li><a href="/#programs">программы питания</a></li>
                                    <li><a href="/catalog/">holymarket</a></li>
                                    <li><a href="#" class="popup-opener" data-popup="#basket-popup">корзина</a></li>
                                </ul>
                            </div>
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
                                <div class="mobileFooter-email visible-xs">
                                    <?  // E-mail.
                                    $APPLICATION->IncludeComponent('bitrix:main.include', '', array(
                                        'AREA_FILE_SHOW' => 'file',
                                        'PATH' => SITE_TEMPLATE_PATH.'/include/data/email.php',
                                        'EDIT_TEMPLATE' => 'html',
                                    ));
                                    ?>
                                </div>
                                <div class="footer-contacts__soc hidden-xs">
                                    <a href="#">
                                        <i class="icon-12 icon-inst"></i>
                                    </a>
                                    <a href="#">
                                        <i class="icon-12 icon-fb"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="footer-info">
                            <div class="mobileFooter-info__warn visible-xs">
                                <?  // Оферта.
                                $APPLICATION->IncludeComponent('bitrix:main.include', '', array(
                                    'AREA_FILE_SHOW' => 'file',
                                    'PATH' => SITE_TEMPLATE_PATH.'/include/data/offer.php',
                                    'EDIT_TEMPLATE' => 'html',
                                ));
                                ?>
                            </div>
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
                            <div class="footer-info__warn hidden-xs">
                                <?  // Оферта.
                                    $APPLICATION->IncludeComponent('bitrix:main.include', '', array(
                                        'AREA_FILE_SHOW' => 'file',
                                        'PATH' => SITE_TEMPLATE_PATH.'/include/data/offer.php',
                                        'EDIT_TEMPLATE' => 'html',
                                    ));
                                ?>
                            </div>
                            <div class="footer-info__email hidden-xs">
                                <?  // E-mail.
                                    $APPLICATION->IncludeComponent('bitrix:main.include', '', array(
                                        'AREA_FILE_SHOW' => 'file',
                                        'PATH' => SITE_TEMPLATE_PATH.'/include/data/email.php',
                                        'EDIT_TEMPLATE' => 'html',
                                    ));
                                ?>
                            </div>
                        </div>
                    </div>
    
                    <button class="button popup-opener" data-popup="#callback-popup">обратный звонок</button>
                    <button class="button popup-opener-remote" data-remote="basket">корзина</button>
    
                    <a class="popup-opener callback-trigger" href="" data-popup="#callback-popup"></a>
                </div>
            </footer>
            
            <?  // Обратный звонок.
                $APPLICATION->IncludeComponent('bitrix:main.include', '', array(
                    'AREA_FILE_SHOW' => 'file',
                    'PATH' => SITE_TEMPLATE_PATH.'/include/area/callback.php',
                    'EDIT_TEMPLATE' => 'html',
                ));
            ?>
            
            <?  // Корзина.
                /*
                $APPLICATION->IncludeComponent('bitrix:main.include', '', array(
                    'AREA_FILE_SHOW' => 'file',
                    'PATH' => SITE_TEMPLATE_PATH.'/include/area/basket.php',
                    'EDIT_TEMPLATE' => 'html',
                ));
                */
            ?>
            
            <?  // Контейнер дял popup'а.
                $APPLICATION->IncludeComponent('bitrix:main.include', '', array(
                    'AREA_FILE_SHOW' => 'file',
                    'PATH' => SITE_TEMPLATE_PATH.'/include/area/popup.php',
                    'EDIT_TEMPLATE' => 'html',
                ));
            ?>
            
            <script src="<?= SITE_TEMPLATE_PATH ?>/js/slick.min.js"></script>
            <script src="<?= SITE_TEMPLATE_PATH ?>/js/script.js"></script>
        </div>
    </body>
</html>