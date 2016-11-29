<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<? $this->setFrameMode(true) ?>

<? if (!empty($arResult['ERRORS'])) { ?>
    <script>
        $(document).ready(function() {
            $('#callback-popup').addClass('is-active');
        });
    </script>
<? } ?>

<h2>Обратный звонок</h2>
<p class="zakaz-text">
    Если у вас есть вопросы, оставьте свой номер телефона, 
    и мы перезвоним вам в любое удобное время.
</p>

<? if (!empty($arResult['ERRORS'])) { ?>
    <p class="error-text"><?= implode('<br/>', (array) $arResult['ERRORS']) ?></p>
<? } ?>

<form class="form" method="post" id="js-form-mail-callback-id">
    <input type="hidden" name="<?= $arParams['FORM'] ?>" value="<?= $arParams['FORM'] ?>" />
    <div class="form-row">
        <span class="label big">Имя</span>
        <div class="input">
            <input type="text" name="NAME" value="<?= $arResult['DATA']['NAME'] ?>" />
        </div>
    </div>
    <div class="form-row">
        <span class="label big">Телефон</span>
        <div class="input">
            <input type="text" name="PHONE" class="js-phone-mask" value="<?= $arResult['DATA']['PHONE'] ?>" />
        </div>
    </div>
    <div class="form-row">
        <span class="label big">Сообщение</span>
        <div class="input">
            <textarea name="MESSAGE"><?= $arResult['DATA']['MESSAGE'] ?></textarea>
        </div>
    </div>
    <div class="form-row radios">
        <span class="label big">Удобное время</span>
        <div class="input">
            <label class="radio">
                <input type="radio" name="TIME" value="09:00-12:00" <?= ($arResult['DATA']['TIME'] == '09:00-12:00') ? ('checked') : ('') ?> />
                <span>09:00-12:00</span>
            </label>
            <label class="radio">
                <input type="radio" name="TIME" value="12:00-15:00" <?= ($arResult['DATA']['TIME'] == '12:00-15:00') ? ('checked') : ('') ?> />
                <span>12:00-15:00</span>
            </label>
            <label class="radio">
                <input type="radio" name="TIME" value="15:00-18:00" <?= ($arResult['DATA']['TIME'] == '15:00-18:00') ? ('checked') : ('') ?> />
                <span>15:00-18:00</span>
            </label>
            <label class="radio">
                <input type="radio" name="TIME" value="любое" <?= ($arResult['DATA']['TIME'] == 'любое') ? ('checked') : ('') ?> />
                <span>любое</span>
            </label>
        </div>
    </div>
    <div class="form-row form-row-buttons">
        <span class="label big"></span>
        <div class="input">
            <button>Отправить</button>
        </div>
    </div>
</form>