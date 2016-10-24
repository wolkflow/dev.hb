<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<? IncludeComponentTemplateLangFile(__FILE__, $this->GetFolder()) ?>

<? $this->setFrameMode(true); ?>

<h2>Регистрация</h2>
<div class="zakaz-login__head">
    <a href="javascript:void(0)" class="popup-opener-remote" data-remote="authorize">Вход в систему</a>
</div>
<div class="zakaz-login__form">
    <? if (!CUser::IsAuthorized()) { ?>
        <form method="post" action="<?= POST_FORM_ACTION_URI ?>" class="js-remote-form" data-link="register">
            <? if (!empty($arResult['ERRORS'])) { ?>
                <div class="errors">
                    <? foreach ($arResult["ERRORS"] as $key => $error) { ?>
                        <? if (intval($key) == 0 && $key !== 0) { ?>
                            <? $arResult['ERRORS'][$key] = str_replace('#FIELD_NAME#', "&quot;".GetMessage("REGISTER_FIELD_".$key)."&quot;", $error); ?>
                        <? } ?>
                    <? } ?>
                    <?= implode('<br/>', $arResult['ERRORS']) ?>
                </div>
            <? } ?>
            
            <input type="hidden" name="REG_FORM" value="Y" />
            <input type="hidden" name="register_submit_button" value="Y" />
            <? if (!empty($arResult['BACKURL'])) { ?>
                <input type="hidden" name="backurl" value="<?= $arResult['BACKURL'] ?>" />
            <? } else { ?>
                <input type="hidden" name="backurl" value="<?= (!empty($_COOKIE['backurl'])) ? (strval($_COOKIE['backurl'])) :("/") ?>" />
            <? } ?>
            
            <div class="form-row">
                <span class="label big">Имя</span>
                <div class="input">
                    <input type="text" name="REGISTER[NAME]" value="<?= $arResult['VALUES']['NAME'] ?>" />
                </div>
            </div>
            <div class="form-row">
                <span class="label big">E-mail</span>
                <div class="input">
                    <input type="text" name="REGISTER[EMAIL]" value="<?= $arResult['VALUES']['EMAIL'] ?>" />
                </div>
            </div>
            <div class="form-row">
                <span class="label big">Логин</span>
                <div class="input">
                    <input type="text" name="REGISTER[LOGIN]" value="<?= $arResult['VALUES']['LOGIN'] ?>" />
                </div>
            </div>
            <div class="form-row">
                <span class="label big">Пароль</span>
                <div class="input">
                    <input type="password" name="REGISTER[PASSWORD]" value="<?= $arResult['VALUES']['PASSWORD'] ?>" />
                </div>
            </div>
            <div class="form-row">
                <span class="label big">Подтвердите пароль</span>
                <div class="input">
                    <input type="password" name="REGISTER[CONFIRM_PASSWORD]" value="<?= $arResult['VALUES']['CONFIRM_PASSWORD'] ?>" />
                </div>
            </div>
            <div class="form-row">
                <span class="label big">Телефон</span>
                <div class="input">
                    <input type="text" name="REGISTER[PERSONAL_MOBILE]" value="<?= $arResult['VALUES']['PERSONAL_MOBILE'] ?>" />
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
            </div>
            <div class="form-row">
                <span class="label big">Адрес доставки</span>
                <div class="input">
                    <input type="text" name="REGISTER[PERSONAL_STREET]" value="<?= $arResult['VALUES']['PERSONAL_STREET'] ?>" />
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
                    <button class="js-submit">Зарегистрироваться</button>
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