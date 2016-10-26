<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<? IncludeComponentTemplateLangFile(__FILE__, $this->GetFolder()) ?>

<? $this->setFrameMode(true); ?>

<h2>Вход в систему</h2>
<div class="zakaz-login">
    <? if (!CUser::IsAuthorized()) { ?>
        <div class="zakaz-login__head">
            <a href="javascript:void(0)" class="popup-opener-remote" data-remote="register">Регистрация</a>
        </div>
        <form name="system_auth_form<?= $arResult['RND'] ?>" class="js-remote-form" data-link="authorize-order">
            <? if (!empty($_REQUEST['AUTH_FORM'])) { ?>
                <div class="errors">
                    <?= $arResult['ERROR_MESSAGE']['MESSAGE'] ?>
                </div>
            <? } ?>
            
            <input type="hidden" name="AUTH_FORM" value="Y" />
            <input type="hidden" name="TYPE" value="AUTH" />
            <? if (strlen($arResult['BACKURL']) > 0) { ?>
                <input type="hidden" name="backurl" value="<?= $arResult['BACKURL'] ?>" />
            <? } else { ?>
                <input type="hidden" name="backurl" value="/" />
            <? } ?>
            <? foreach ($arResult['POST'] as $key => $value) { ?>
                <input type="hidden" name="<?= $key ?>" value="<?= $value ?>" />
            <? } ?>
            
            <div class="zakaz-login__form">
                <div class="form-row">
                    <span class="label">Логин</span>
                    <div class="input">
                        <input type="text" name="USER_LOGIN" value="<?= strval($_REQUEST['USER_LOGIN']) ?>" />
                    </div>
                </div>
                <div class="form-row">
                    <span class="label">Пароль</span>
                    <div class="input">
                        <input type="text" name="USER_PASSWORD" value="<?= strval($_REQUEST['USER_PASSWORD']) ?>" />
                    </div>
                </div>
                <div class="form-row form-row-buttons">
                    <span class="label"></span>
                    <div class="input">
                        <button class="js-submit">Войти</button>
                        <a href="javascript:void(0)" class="zakaz-forgot popup-opener-remote" data-remote="forgotpassword">Забыли пароль?</a>
                    </div>
                </div>
            </div>
        </form>
    <? } else { ?>
        <p>Вы успешно авторизованы на сайте</p>
        
        <? if (!empty($_REQUEST['AUTH_FORM'])) { ?>
            <script>
                $(document).ready(function() {
                    getRemoteHTML('order', '#js-popup-content');
                });
            </script>
        <? } ?>
    <? } ?>
</div>