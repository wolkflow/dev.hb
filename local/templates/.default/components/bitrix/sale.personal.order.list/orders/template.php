<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<? Bitrix\Main\Loader::includeModule('glyf.core') ?>

<? use Glyf\Core\Helpers\Text as TextHelper ?>

<? $this->setFrameMode(true); ?>

<section class="inner-page center">
    <div class="cabinet-head">
        <h1>Личный кабинет</h1>
        <div class="cabinet-head__buttons">
            <a href="/cabinet/" class="button-white">Профиль</a>
            <a href="/cabinet/orders/" class="button-white is-active">Мои заказы</a>
        </div>
    </div>
    <div class="center page-content cabinet-orders clearfix">
        <h2>Мои заказы</h2>
        <? if (!empty($arResult['ORDERS'])) { ?>
            <div class="cabinet-orders-table">
                <div class="cabinet-orders-table__head">
                    <div class="cabinet-orders-table__row">
                        <div class="cabinet-orders-table__cell">
                            дата заказа <span class="sort-asc"></span>
                        </div>
                        <div class="cabinet-orders-table__cell">статус</div>
                        <div class="cabinet-orders-table__cell">общая стоимость</div>
                    </div>
                </div>
                <div class="cabinet-orders-table__body">
                    <div class="cabinet-orders-table__item">
                        <? foreach ($arResult['ORDERS'] as $item) { ?>
                            <? $order = $item['ORDER'] ?>
                            <? $baskets = $item['BASKET_ITEMS'] ?>
                            
                            <div class="cabinet-orders-table__item">
                                <div class="cabinet-orders-table__row">
                                    <div class="cabinet-orders-table__cell">
                                        <?= date('d', strtotime($order['DATE_INSERT'])) ?>
                                        <?= TextHelper::i18nmonth(date('m', strtotime($order['DATE_INSERT'])), false) ?>
                                        <?= date('Y', strtotime($order['DATE_INSERT'])) ?>
                                    </div>
                                    <div class="cabinet-orders-table__cell">
                                        <?= $arResult['STATUSES'][$order['STATUS_ID']]['NAME'] ?>
                                    </div>
                                    <div class="cabinet-orders-table__cell">
                                        <span>
                                            <?= round($order['PRICE'], 2) ?> Р
                                        </span>
                                        <div class="cabinet-orders-table__buttons">
                                            <a class="button" href="#">Повторить</a>
                                            <a class="button-white cabinet-orders-table__toggle" href="javascrript:void(0)">
                                                Детали
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="cabinet-orders-table__subtable">
                                    <? foreach ($baskets as $basket) { ?>
                                        <div class="cabinet-orders-table__row">
                                            <div class="cabinet-orders-table__cell">
                                                <?= $basket['NAME'] ?>
                                            </div>
                                            <div class="cabinet-orders-table__cell">
                                                <?= $basket['QUANTITY'] ?>
                                            </div>
                                            <div class="cabinet-orders-table__cell">
                                                <?= round($basket['PRICE']) ?> Р
                                            </div>
                                        </div>
                                    <? } ?>
                                    <div class="cabinet-orders-table__row cabinet-orders-table__total">
                                        <div class="cabinet-orders-table__cell">Общая сумма</div>
                                        <div class="cabinet-orders-table__cell">
                                            <?= round($order['PRICE'], 2) ?> Р
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <? } ?>
                    </div>
                </div>
            </div>
        <? } else { ?>
            <p>Список заказов пуст</p>
        <? } ?>
    </div>
</section>