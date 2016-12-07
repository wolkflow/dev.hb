<div id="callback-popup" class="popup">
    <div class="popup-container popup-container-right">
        <div class="popup-close hidden-xs">закрыть</div>
        <div class="popup-content">
            <?	// Форма обратного звонка.
                $APPLICATION->IncludeComponent(
                    "glyf:form.mail",
                    "callback",
                    array(
                        'FORM'     => 'BACKCALL',
                        'CAPTCHA'  => 'N',
                        'FIELDS'   => array('NAME', 'PHONE', 'MESSAGE', 'TIME'),
                        'REQUIRED' => array('NAME', 'PHONE'),
                    )		
                );
            ?>
        </div>
    </div>
</div>