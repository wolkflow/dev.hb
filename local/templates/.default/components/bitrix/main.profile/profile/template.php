<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<? $this->setFrameMode(true) ?>

<? $arProps = $arResult['USER_PROPERTIES']['DATA'] ?>

<section>
        <h1>Личный кабинет</h1>
        <div class="cabinet-head__buttons">
            <a href="javascript:void(0)" class="button-white is-active">Профиль</a>
            <a href="/cabinet/orders/" class="button-white">Мои заказы</a>
        </div>
    <div class="container main-unit hei4">
        <div class="row">
            <h2>О себе</h2>
            
            <div class="error">
                <?= $arResult['strProfileError'] ?>
            </div>
            
            <form method="POST">
                <?= $arResult['BX_SESSION_CHECK'] ?>
                <input type="hidden" name="save" value="Y" />
                <input type="hidden" name="lang" value="<?= LANG ?>" />
                <div class="cabinet-form">
                    <div class="form-row">
                        <span class="label big">Имя</span>
                        <div class="input">
                            <input type="text" name="NAME" value="<?= $arResult['arUser']['NAME'] ?>" />
                        </div>
                    </div>
                    <div class="form-row">
                        <span class="label big">E-mail</span>
                        <div class="input">
                            <input type="text" name="EMAIL" value="<?= $arResult['arUser']['EMAIL'] ?>" />
                        </div>
                    </div>
                    <div class="form-row">
                        <span class="label big">Логин</span>
                        <div class="input">
                            <input type="text" name="LOGIN" value="<?= $arResult['arUser']['LOGIN'] ?>" />
                        </div>
                    </div>
                    <div class="form-row">
                        <span class="label big">Новый пароль</span>
                        <div class="input">
                            <input type="password" name="NEW_PASSWORD" value="" autocomplete="off" />
                        </div>
                    </div>
                    <div class="form-row">
                        <span class="label big">Повтор пароля</span>
                        <div class="input">
                            <input type="password" name="NEW_PASSWORD_CONFIRM" value="" autocomplete="off" />
                        </div>
                    </div>
                    
                    <? /*
                    <div class="input-tip">
                        <a href="#">Показать пароль</a>
                    </div>
                    */ ?>
                   
                    <div class="form-row">
                        <span class="label big">Телефон</span>
                        <div class="input">
                            <input type="text" name="PERSONAL_MOBILE" value="<?= $arResult['arUser']['PERSONAL_MOBILE'] ?>" autocomplete="off" />
                        </div>
                    </div>
                    <div class="form-row">
                        <span class="label big">Пол</span>
                        <div class="input radios">
                            <label class="radio">
                                <input type="radio" name="PERSONAL_GENDER" value="M" <?= ($arResult['arUser']['PERSONAL_GENDER'] == 'M') ? ('checked') : ('') ?> />
                                <span>мужской</span>
                            </label>
                            <label class="radio">
                                <input type="radio" name="PERSONAL_GENDER" value="F" <?= ($arResult['arUser']['PERSONAL_GENDER'] == 'F') ? ('checked') : ('') ?> />
                                <span>женский</span>
                            </label>
                        </div>
                    </div>
                    <div class="form-row">
                        <span class="label big">Адрес доставки</span>
                        <div class="input">
                            <input type="text" name="PERSONAL_STREET" value="<?= $arResult['arUser']['PERSONAL_STREET'] ?>" autocomplete="off" />
                        </div>
                    </div>
                </div>
                
                <h2>Получение рассылки Holybean</h2>
                <div class="cabinet-subscribe">
                    <label class="checkbox">
                        <input type="checkbox" name="UF_NEWSLETTER" value="1" <?= ($arProps['UF_NEWSLETTER']['VALUE']) ? ('checked') : ('') ?> />
                        <span>Я хочу получать новости от HOLYBEAN</span>
                    </label>
                </div>
                <div class="form-row form-row-buttons">
                    <span class="label big"></span>
                    <div class="input">
                        <button type="submit">Сохранить</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>