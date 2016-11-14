<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<? $this->setFrameMode(true) ?>

<? 	// Вывбод ошибок.
	$arResult['ERRORS'] = array();
	$error   = '';
	$message = '';
	$login   = false;
	if ($arParams['AUTH_RESULT']['TYPE'] == 'ERROR') {
		$error = $arParams['~AUTH_RESULT']['MESSAGE'];
	} elseif ($arParams['AUTH_RESULT']['TYPE'] == 'OK') {
		$login   = true;
		$message = 'Пароль успешно изменен'; //$arParams['~AUTH_RESULT']['MESSAGE'];
	}
	
	if (strpos($error, 'Пользователь с логином') !== false) {
		$arResult['ERRORS']['LOGIN'] = 'Неверный логин';
	}
	if (strpos($error, 'Пароль должен содержать латинские символы нижнего регистра') !== false) {
		$arResult['ERRORS']['PASSRORD'] = 'Пароль слишком простой';
	}
	if (strpos($error, 'Пароль должен содержать латинские символы верхнего регистра') !== false) {
		$arResult['ERRORS']['PASSRORD'] = 'Пароль слишком простой';
	}
	if (strpos($error, 'Пароль должен содержать знаки пунктуации') !== false) {
		$arResult['ERRORS']['PASSRORD'] = 'Пароль слишком простой';
	}
	if (strpos($error, 'Пароль должен содержать цифры') !== false) {
		$arResult['ERRORS']['PASSRORD'] = 'Пароль должен содержать цифры';
	}
	if (strpos($error, 'Пароль должен  быть не менее') !== false) {
		if (empty($_REQUEST['USER_PASSWORD'])) { 
			$arResult['ERRORS']['PASSRORD'] = 'Пароль не задан';
		} else {
			$arResult['ERRORS']['PASSRORD'] = 'Пароль слишком короткий';
		}
	}
	if (strpos($error, 'Неверное подтверждение пароля') !== false) {
		$arResult['ERRORS']['CONFIRM_PASSROWD'] = 'Неверное подтверждение пароля';
	}
	if (strpos($error, 'Неверное контрольное слово') !== false) {
		$arResult['ERRORS']['CHECKWORD'] = 'Неверное контрольное слово';
	}
	
	// Пароль успешно изменен.
	if (FALSE && $login) {
		// Авторизация пользователя.
		$USER->Login($arResult['LAST_LOGIN'], $arResult['USER_PASSWORD'], 'N', 'Y');
		if ($USER->IsAuthorized()) {
			LocalRedirect('/');
			exit();
		}
	}
?>
<? if (constant('RESTORE') == true) { ?>
	<script>
		$(document).ready(function() {
			$('#restore-tab-id').trigger('click');
		});
	</script>
<? } ?>
<input type="hidden" id="restore-tab-id" class="langing-popup" data-target="restore" />

<div id="popup_restore" class="bl_enter_container clearfix js-changepasswd">
	<div id="js-changepasswd-success-wrap" class="popup_after_send_text">
		<div class="popup_after_send_text_tb">
  			<div class="popup_after_send_text_td bl_form_txt_send_td">
   				<p class="js-message-id">Ваш пароль был успешно изменен.</p>
  			</div>
 		</div>
	</div>

	<div class="clearfix">
		<form id="js-changepasswd-form-id" name="form_auth" method="post" target="_top" action="<?= $arResult['AUTH_URL'] ?>">
			<input type="hidden" name="AUTH_FORM" value="Y" />
			<input type="hidden" name="TYPE" value="CHANGE_PWD" />
			<? if (strlen($arResult['BACKURL']) > 0) { ?>
				<input type="hidden" name="backurl" value="<?= $arResult['BACKURL'] ?>" />
			<? } ?>
			
			<div class="bl_reg_enter_top_tx">
				<p class="js-message-id">Введите логин (e-mail), и новый пароль.</p>
			</div>
			<div class="bl_form" id="js-restore-wrapper-id">
				<div class="bl_form_row">
					<input type="text" placeholder="Логин" title="Логин" name="USER_LOGIN" value="<?= $arResult['LAST_LOGIN'] ?>" />
					<span class="text_after_focus">Логин</span>
				</div>
				<div class="bl_main_reg_left">
					<div class="bl_form_row">
						<input type="password" placeholder="Новый пароль" title="Пароль" name="USER_PASSWORD" />
						<span class="text_after_focus">Пароль</span>
					</div>
					<div class="bl_form_row" style="display:none;">
						<input type="text" placeholder="Проверочный код" title="Код" name="USER_CHECKWORD" maxlength="50" value="<?= $arResult['USER_CHECKWORD'] ?>" />
						<span class="text_after_focus">Код</span>
					</div>
				</div>
				<div class="bl_main_reg_right">
					<div class="bl_form_row">
						<input type="password" placeholder="Подтвердите пароль" title="Подтверждение" name="USER_CONFIRM_PASSWORD" />
						<span class="text_after_focus">Подтверждение</span>
					</div>
				</div>
				
				<div class="bl_enter_container_btns">
					<div class="bl_main_reg_left">
						<input type="button" value="Отмена" class="btn_back langing-popup" data-target="auth" />
					</div>
					<div class="bl_main_reg_right">
						<input id="js-form-restore-submit-button-id" type="button" name="change_pwd" value="Сохранить" class="btn_reg" />
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$('#js-form-restore-submit-button-id', '#js-changepasswd-form-id').on('click', function(e) {
			e.preventDefault();
			
			$.ajax({
				url: '/ajax/changepasswd/',
				type: 'POST',
				data: $('#js-changepasswd-form-id').serialize(),
				dataType: 'json',
				cache: false,
				beforeSend: function() {
					$('#js-changepasswd-form-id .bl_form_tx_error').remove();
				},
				success: function(response) {
					if (response.success) {
						$('#js-changepasswd-success-wrap').addClass('active');
						/*
						$('.js-changepasswd .js-message-id').html(response.message);
						$('#js-restore-wrapper-id').slideUp();
						*/
						setTimeout(function() { location.href = '/'; }, 1700);
					} else {
						for (var code in response.errors) {
							$('.js-changepasswd input[name="' + code + '"]').closest('.bl_form_row').append('<div class="bl_form_tx_error error_show"><i>' + response.errors[code] + '</i></div>');
						}
					}
				}, 
				error: function() {
					
				}
			});
			return false;
		});
	});
</script>