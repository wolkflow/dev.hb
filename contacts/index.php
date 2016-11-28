<? require ($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php") ?>
<? $APPLICATION->SetTitle("HolyBean"); ?>

<main>
    <section>
        <div class="container">
            <h1>Контакты</h1>
        </div>
        <div class="container main-unit ots1">
            <div class="contacts-blocks hei3">
                <div class="contacts-blocks__item txt1 txt21 contacts_xs_1">
                    <?  // Телефон.
                        $APPLICATION->IncludeComponent('bitrix:main.include', '', array(
                            'AREA_FILE_SHOW' => 'file',
                            'PATH' => SITE_TEMPLATE_PATH.'/include/data/phone.php',
                            'EDIT_TEMPLATE' => 'html',
                        ));
                    ?>
                </div>
                <div class="contacts-blocks__item txt1 txt22 contacts_xs_1">
                    <?  // E-mail.
                        $APPLICATION->IncludeComponent('bitrix:main.include', '', array(
                            'AREA_FILE_SHOW' => 'file',
                            'PATH' => SITE_TEMPLATE_PATH.'/include/data/email.php',
                            'EDIT_TEMPLATE' => 'html',
                        ));
                    ?>
                </div>
                <div class="contacts-blocks__item txt1 contacts_xs_1 contacts_xs_3">
                    <div class="contacts_xs_2"><a href="#">facebook</a></div>
                    <div class="contacts_xs_2"><a href="#">instagram</a></div>

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
        </div>
    </section>
</main>

<? require ($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php") ?>