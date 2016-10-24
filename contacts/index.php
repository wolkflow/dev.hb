<? require ($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php") ?>
<? $APPLICATION->SetTitle("HolyBean"); ?>

<main>
    <section class="inner-page center">
        <h1>Контакты</h1>
        <div class="contacts-blocks">
            <div class="contacts-blocks__item">
                <?  // Телефон.
                    $APPLICATION->IncludeComponent('bitrix:main.include', '', array(
                        'AREA_FILE_SHOW' => 'file',
                        'PATH' => SITE_TEMPLATE_PATH.'/include/data/phone.php',
                        'EDIT_TEMPLATE' => 'html',
                    ));
                ?>
            </div>
            <div class="contacts-blocks__item">
                <?  // E-mail.
                    $APPLICATION->IncludeComponent('bitrix:main.include', '', array(
                        'AREA_FILE_SHOW' => 'file',
                        'PATH' => SITE_TEMPLATE_PATH.'/include/data/email.php',
                        'EDIT_TEMPLATE' => 'html',
                    ));
                ?>
            </div>
            <div class="contacts-blocks__item">
                <a href="#">facebook</a>
                <a href="#">instagram</a>
            </div>
        </div>
        
        <?	// Форма обратной связи.
            $APPLICATION->IncludeComponent(
                "glyf:form.mail",
                "feedback",
                array(
                    'FORM'     => 'FEEDBACK',
                    'CAPTCHA'  => 'N',
                    'FIELDS'   => array('NAME', 'PHONE', 'EMAIL', 'MESSAGE'),
                    'REQUIRED' => array('NAME', 'PHONE', 'EMAIL', 'MESSAGE'),
                )		
            );
        ?>
    </section>
</main>

<? require ($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php") ?>