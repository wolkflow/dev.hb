<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<? IncludeComponentTemplateLangFile(__FILE__, $this->GetFolder()) ?>

<? $this->setFrameMode(true); ?>

<h2>Оформление заказа</h2>
<div class="zakaz-login">
    <div class="zakaz-login__head">
        <h3>Вход в систему</h3>
        <a href="javascript:void(0)" class="popup-opener-remote" data-remote="register">Регистрация</a>
    </div>
    <form class="js-remote-form" data-action="authorize">
        <div class="errors"></div>
        <div class="zakaz-login__form">
            <div class="form-row">
                <span class="label">Логин</span>
                <div class="input">
                    <input type="text" name="USER_LOGIN" />
                </div>
            </div>
            <div class="form-row">
                <span class="label">Пароль</span>
                <div class="input">
                    <input type="text" name="USER_PASSWORD" />
                </div>
            </div>
            <div class="form-row form-row-buttons">
                <span class="label"></span>
                <div class="input">
                    <button class="js-submit">Войти</button>
                    <a href="javascript:void(0)" class="zakaz-forgot popup-opener" data-popup="#register-popup">Забыли пароль?</a>
                </div>
            </div>
        </div>
    </form>
</div>

<? /*

<div class="modal modal-login" id="modal-authorize">
	<div class="modalTitle">
		<?= getMessage('GL_AUTHORIZATION') ?>
		<div class="modalClose arcticmodal-close"></div>
	</div>
	<? //print_r($arParams) ?>
	<? //print_r($arResult) ?>
	<div class="modalContent">
		<form name="system_auth_form<?= $arResult['RND'] ?>" method="post">
                        <div class="form-error">
                                <?= $arResult['ERROR_MESSAGE'] ?>
                        </div>
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
			
			<ul class="formList">
				<li>
					<label for="regmail">
						<?= getMessage('GL_EMAIL') ?>
					</label>
					<input type="text" id="regmail" name="USER_LOGIN" />
				</li>
				<li>
					<label for="regpass">
						<?= getMessage('GL_PASSWORD') ?>
					</label>
					<input type="password" id="regpass" name="USER_PASSWORD" />
				</li>
				<li>
					<br/>
					<input type="submit" value="ОК" />
				</li>
			</ul>
		</form>
	</div>
</div>
*/ ?>