<?php

require ($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

?>

<script>
    $(document).ready(function() {
        $('#js-submit-form-id').on('click', function(event) {
            event.preventDefault();
            
            var phone = $('#js-param-phone-id').val();
            
            $('#js-param-phone-id').closest('.form-row').find('.input-error').remove();
            
            if (phone.length < 7) {
                $('#js-param-phone-id').closest('.form-row').append('<div class="input-error">Не указан номер телефона</div>');
            } else {
                $.ajax({
                    url: '/remote/',
                    data: {'action': 'restore-password', 'phone': phone},
                    success: function(response) {
                        if (response.status) {
                            $('#js-param-phone-id').prop('disabled', 'disabled');
                            $('#js-submit-form-id').fadeOut();
                            $('#js-restore-message-id').html(response.message);
                        } else {
                            $('#js-param-phone-id').closest('.form-row').append('<div class="input-error">' + response.message + '</div>');
                        }
                    }
                });
            }
        });
    });
</script>

<h2>Восстановление пароля</h2>
<p id="js-restore-message-id" class="zakaz-text zakaz-text-recover">
    Для восстановления пароля, пожалуйста, введите номер телефона, который вы указывали при регистрации.
</p>
<div class="zakaz-login">
    <div id="js-restore-wrap-id" class="zakaz-login__form">
        <div class="errors"></div>
        <div class="form-row">
            <span class="label">Телефон</span>
            <div class="input">
                <input id="js-param-phone-id" type="text" name="PHONE" value="<?= strval($_REQUEST['PHONE']) ?>" />
            </div>
        </div>
        <div class="form-row form-row-buttons">
            <span class="label"></span>
            <div class="input">
                <button id="js-submit-form-id">Восстановить пароль</button>
                <a href="javascript:void(0)" class="zakaz-forgot popup-opener-remote" data-remote="authorize-order">Вход в систему</a>
            </div>
        </div>
    </div>
</div>