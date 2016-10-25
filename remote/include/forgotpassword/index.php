<?php

require ($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

?>

<script>
    $(document).ready(function() {
        $('#js-submit-form-id').on('click', function(event) {
            event.preventDefault();
            
            var phone = $('#js-param-phone-id').val();
            
            if (phone.length < 7) {
                $('#js-restore-wrap-id .errors').html('Не указан номер телефона');
            }
            
            $.ajax({
                url: '/remote/',
                data: {'action': 'restore-password', 'phone': phone},
                success: function(response) {
                    if (response.status) {
                        $('#js-restore-wrap-id').hide();
                        $('#js-restore-message-id').html(response.message);
                    } else {
                        $('#js-restore-wrap-id .errors').html(response.message);
                    }
                }
            });
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
            </div>
        </div>
    </div>
</div>