<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<? IncludeComponentTemplateLangFile(__FILE__, $this->GetFolder()) ?>

<? $this->setFrameMode(true); ?>

<script>
    $(document).ready(function() {
        $('#js-submit-phone-id').on('click', function(event) {
            event.preventDefault();
            
            var phone = $('#js-param-phone-id').val();
            
            $('#js-param-phone-id').closest('.form-row').find('.input-error').html('');
            
            if (phone.length < 7) {
                $('#js-param-phone-id').closest('.form-row').find('.input-error').html('Не указан номер телефона');
            }
                        
            $.ajax({
                url: '/remote/',
                data: {'action': 'register-sms-send', 'phone': phone},
                success: function(response) {
                    if (response.status) {
                        $('#js-phone-confirm-id').removeClass('hide');
                        
                        $('#js-submit-phone-id').addClass('hide');
                        $('#js-submit-form-id').removeClass('hide');
                    } else {
                        $('#js-param-phone-id').closest('.form-row').find('.input-error').html(response.message);
                    }
                    $('.js-phone-mask').mask("\+7 (999) 999-99-99"); 
                }
            });
        });
        
        
        $('#js-param-email-id').on('focusout', function() {
            var $that   = $(this);
            var email   = $that.val();
            var pattern = /^.+@.+\.[a-z]{2,}$/i;
            
            if (pattern.test(email)) {
                $that.closest('.form-row').find('.input-error').html('');
            } else {
                $that.closest('.form-row').find('.input-error').html('Проверьте корректность e-mail');
            }
        });
        
        
        $('#js-param-password-id').on('focusout', function() {
            var $pass = $('#js-param-password-id');
            var $conf = $('#js-param-confirm-id');
            
            var password = $pass.val();
            var confirm  = $conf.val();
            
            if (confirm.length > 0) {
                if (password == confirm) {
                    $conf.closest('.form-row').find('.input-error').html('');
                } else {
                    $conf.closest('.form-row').find('.input-error').html('Подтверждение и пароль не совпадают');
                }
            }
        });
        
        $('#js-param-confirm-id').on('focusout', function() {
            var $pass = $('#js-param-password-id');
            var $conf = $('#js-param-confirm-id');
            
            var password = $pass.val();
            var confirm  = $conf.val();
            
            if (password == confirm) {
                $conf.closest('.form-row').find('.input-error').html('');
            } else {
                $conf.closest('.form-row').find('.input-error').html('Подтверждение и пароль не совпадают');
            }
        });
    });
</script>

<?  // Ошибки.
    if (!empty($arResult['ERRORS'])) {
        $errors = array();
        foreach ($arResult['ERRORS'] as $key => $error) {
            if (intval($key) == 0 && $key !== 0) {
                $arResult['ERRORS'][$key] = str_replace('#FIELD_NAME#', "&quot;".GetMessage("REGISTER_FIELD_".$key)."&quot;", $error); 
            } elseif (mb_strpos($error, 'Неверное подтверждение пароля.') !== false) {
                $arResult['ERRORS']['CONFIRM_PASSWORD'] = 'Неверное подтверждение пароля';
            } elseif (mb_strpos($error, 'Неверный E-Mail.') !== false) {
                $arResult['ERRORS']['EMAIL'] = 'Неверный E-mail';
            } else {
                $errors []= str_replace('#FIELD_NAME#', "&quot;".GetMessage("REGISTER_FIELD_".$key)."&quot;", $error); 
            }
        }
    } 
?>

<h2>Регистрация</h2>
<div class="zakaz-login__head">
    <a href="javascript:void(0)" class="popup-opener-remote" data-remote="authorize">Вход в систему</a>
</div>
<div class="zakaz-login__form">
    <? if (!CUser::IsAuthorized()) { ?>
        <form method="post" action="<?= POST_FORM_ACTION_URI ?>" class="js-remote-form" data-link="register">
            <input type="hidden" name="REG_FORM" value="Y" />
            <input type="hidden" name="register_submit_button" value="Y" />
            <? if (!empty($arResult['BACKURL'])) { ?>
                <input type="hidden" name="backurl" value="<?= $arResult['BACKURL'] ?>" />
            <? } else { ?>
                <input type="hidden" name="backurl" value="<?= (!empty($_COOKIE['backurl'])) ? (strval($_COOKIE['backurl'])) :("/") ?>" />
            <? } ?>
            
            <? if (!empty($errors)) { ?>
                <div class="errors">
                    <?= implode('<br/>', $errors) ?>
                </div>
            <? } ?>
            
            <div class="form-row">
                <span class="label big">Имя</span>
                <div class="input">
                    <input type="text" name="REGISTER[NAME]" value="<?= $arResult['VALUES']['NAME'] ?>" />
                </div>
                <div class="input-error">
                    <? if (!empty($arResult['ERRORS']['NAME'])) { ?>
                        <?= $arResult['ERRORS']['NAME'] ?>
                    <? } ?>
                </div>
            </div>
            <div class="form-row">
                <span class="label big">Фамилия</span>
                <div class="input">
                    <input type="text" name="REGISTER[LAST_NAME]" value="<?= $arResult['VALUES']['LAST_NAME'] ?>" />
                </div>
                <div class="input-error">
                    <? if (!empty($arResult['ERRORS']['LAST_NAME'])) { ?>
                        <?= $arResult['ERRORS']['LAST_NAME'] ?>
                    <? } ?>
                </div>
            </div>
            <div class="form-row">
                <span class="label big">E-mail</span>
                <div class="input">
                    <input type="text" name="REGISTER[EMAIL]" value="<?= $arResult['VALUES']['EMAIL'] ?>" id="js-param-email-id" />
                </div>
                <div class="input-error">
                    <? if (!empty($arResult['ERRORS']['EMAIL'])) { ?>
                        <?= $arResult['ERRORS']['EMAIL'] ?>
                    <? } ?>
                </div>
            </div>
            <div class="form-row">
                <span class="label big">Логин</span>
                <div class="input">
                    <input type="text" name="REGISTER[LOGIN]" value="<?= $arResult['VALUES']['LOGIN'] ?>" />
                </div>
                <div class="input-error">
                    <? if (!empty($arResult['ERRORS']['LOGIN'])) { ?>
                        <?= $arResult['ERRORS']['LOGIN'] ?>
                    <? } ?>
                </div>
            </div>
            <div class="form-row">
                <span class="label big">Пароль</span>
                <div class="input">
                    <input type="password" name="REGISTER[PASSWORD]" value="<?= $arResult['VALUES']['PASSWORD'] ?>" autocomplete="false" id="js-param-password-id" />
                </div>
                <div class="input-error">
                    <? if (!empty($arResult['ERRORS']['PASSWORD'])) { ?>
                        <?= $arResult['ERRORS']['PASSWORD'] ?>
                    <? } ?>
                </div>
            </div>
            <div class="form-row">
                <span class="label big">Подтвердите пароль</span>
                <div class="input">
                    <input type="password" name="REGISTER[CONFIRM_PASSWORD]" value="<?= $arResult['VALUES']['CONFIRM_PASSWORD'] ?>" autocomplete="false"  id="js-param-confirm-id" />
                </div>
                <div class="input-error">
                    <? if (!empty($arResult['ERRORS']['CONFIRM_PASSWORD'])) { ?>
                        <?= $arResult['ERRORS']['CONFIRM_PASSWORD'] ?>
                    <? } ?>
                </div>
            </div>
            <div class="form-row">
                <span class="label big">Телефон</span>
                <div class="input">
                    <input type="tel" name="REGISTER[PERSONAL_MOBILE]" class="js-phone-mask" pattern="[0-9]*" value="<?= $arResult['VALUES']['PERSONAL_MOBILE'] ?>" id="js-param-phone-id" />
                </div>
                <div class="input-error">
                    <? if (!empty($arResult['ERRORS']['PERSONAL_MOBILE'])) { ?>
                        <?= $arResult['ERRORS']['PERSONAL_MOBILE'] ?>
                    <? } ?>
                </div>
            </div>
            <div class="form-row">
                <span class="label big">Пол</span>
                <div class="input">
                    <label class="radio">
                        <input type="radio" name="REGISTER[PERSONAL_GENDER]" value="M" <?= ($arResult['VALUES']['PERSONAL_GENDER'] == 'M') ? ('checked') : ('') ?> />
                        <span>мужской</span>
                    </label>
                    <label class="radio">
                        <input type="radio" name="REGISTER[PERSONAL_GENDER]" value="F" <?= ($arResult['VALUES']['PERSONAL_GENDER'] == 'F') ? ('checked') : ('') ?> />
                        <span>женский</span>
                    </label>
                </div>
                <div class="input-error">
                    <? if (!empty($arResult['ERRORS']['PERSONAL_GENDER'])) { ?>
                        <?= $arResult['ERRORS']['PERSONAL_GENDER'] ?>
                    <? } ?>
                </div>
            </div>
            <div class="form-row">
                <span class="label big">Адрес доставки</span>
                <div class="input">
                    <input type="text" name="REGISTER[PERSONAL_STREET]" value="<?= $arResult['VALUES']['PERSONAL_STREET'] ?>" />
                </div>
                <div class="input-error">
                    <? if (!empty($arResult['ERRORS']['PERSONAL_STREET'])) { ?>
                        <?= $arResult['ERRORS']['PERSONAL_STREET'] ?>
                    <? } ?>
                </div>
            </div>
            
            <div id="js-phone-confirm-id" class="form-row <?= (empty($_SESSION['SMS_CODE'])) ? ('hide') : ('') ?>">
                <span class="label big">Код из смс</span>
                <div class="input">
                    <input type="text" name="PHONE_CONFIRM" value="<?= strval($_REQUEST['PHONE_CONFIRM']) ?>" id="js-param-smscode-id" />
                </div>
                <div class="input-error">
                    <? if (!empty($arResult['ERRORS']) && $arResult['ERRORS'][0] == 'Вы не подтвердили номер телефона') { ?>
                        Вы не подтвердили номер телефона
                    <? } ?>
                </div>
            </div>
            
            <div class="form-row">
                <span class="label big"><span class="zakaz-required">Все поля обязательны для заполнения</span></span>
                <div class="input">
                    <label class="checkbox">
                        <input type="checkbox" name="UF_NEWSLETTER" value="1" <?= ($arResult['VALUES']['UF_NEWSLETTER']) ? ('checked') : ('') ?> />
                        <span>Я хочу получать новости от HOLYBEAN</span>
                    </label>
                </div>
            </div>
            <div class="form-row form-row-buttons">
                <span class="label big"></span>
                <div class="input">
                    <? if (empty($_SESSION['SMS_CODE'])) { ?>
                        <button id="js-submit-phone-id">Подтвердить телефон</button>
                        <button id="js-submit-form-id" class="js-submit hide">Зарегистироваться</button>
                    <? } else { ?>
                        <button id="js-submit-phone-id" class="hide">Подтвердить телефон</button>
                        <button id="js-submit-form-id" class="js-submit">Зарегистироваться</button>
                    <? } ?>
                </div>
            </div>
        </form>
    <? } else { ?>
        <p>Вы успешно зарегистрированы на сайте</p>
        
        <? if (!empty($_REQUEST['REG_FORM'])) { ?>
            <script>
                $(document).ready(function() {
                    location.reload();
                });
            </script>
        <? } ?>
    <? } ?>
</div>