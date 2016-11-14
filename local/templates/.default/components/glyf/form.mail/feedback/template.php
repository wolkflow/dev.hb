<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<? $this->setFrameMode(true); ?>


<div class="container main-unit">
    <div class="row hei4">
        <h2>Обратная связь</h2>
        <form method="post">
            <input type="hidden" name="<?= $arParams['FORM'] ?>" value="<?= $arParams['FORM'] ?>" />
            <div class="form-row">
                <span class="label big">Имя</span>
                <div class="input">
                    <input type="text" name="NAME" value="<?= $arResult['DATA']['NAME'] ?>" placeholder="Екатерина Трачук" autocomplete="off" />
                </div>
                <? if ($_REQUEST[$arParams['FORM']] == $arParams['FORM'] && empty($arResult['DATA']['NAME'])) { ?>
                    <div class="input-error">
                        Поле не заполнено
                    </div>
                <? } ?>
            </div>
            <div class="form-row">
                <span class="label big">E-mail</span>
                <div class="input">
                    <input type="text" name="EMAIL" value="<?= $arResult['DATA']['EMAIL'] ?>" autocomplete="off" />
                </div>
                <? if ($_REQUEST[$arParams['FORM']] == $arParams['FORM'] && empty($arResult['DATA']['EMAIL'])) { ?>
                    <div class="input-error">
                        Поле не заполнено
                    </div>
                <? } ?>
            </div>
            <div class="form-row">
                <span class="label big">Телефон</span>
                <div class="input">
                    <input type="text" name="PHONE" value="<?= $arResult['DATA']['PHONE'] ?>"autocomplete="off" />
                </div>
                <? if ($_REQUEST[$arParams['FORM']] == $arParams['FORM'] && empty($arResult['DATA']['PHONE'])) { ?>
                    <div class="input-error">
                        Поле не заполнено
                    </div>
                <? } ?>
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
</div>