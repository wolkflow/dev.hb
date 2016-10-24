<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<? $this->setFrameMode(true); ?>


<div class="contacts-form">
    <h2>Обратная связь</h2>
    <form method="post">
        <input type="hidden" name="<?= $arParams['FORM'] ?>" value="<?= $arParams['FORM'] ?>" />
        <div class="form-row">
            <span class="label big">Имя</span>
            <div class="input">
                <input type="text" name="NAME" value="<?= $arResult['DATA']['NAME'] ?>" placeholder="Екатерина Трачук" />
            </div>
        </div>
        <div class="form-row">
            <span class="label big">E-mail</span>
            <div class="input">
                <input type="text" name="EMAIL" value="<?= $arResult['DATA']['EMAIL'] ?>" />
            </div>
        </div>
        <div class="form-row">
            <span class="label big">Телефон</span>
            <div class="input">
                <input type="text" name="PHONE" value="<?= $arResult['DATA']['PHONE'] ?>" />
            </div>
        </div>
        <div class="form-row">
            <span class="label big">Сообщение</span>
            <div class="input">
                <textarea name="MESSAGE"><?= $arResult['DATA']['MESSAGE'] ?></textarea>
            </div>
        </div>
        <div class="form-row form-row-buttons">
            <span class="label big"></span>
            <div class="input">
                <button type="submit">Отправить</button>
            </div>
        </div>
    </form>
</div>