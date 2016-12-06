<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<? Bitrix\Main\Loader::includeModule('glyf.core') ?>

<? use Glyf\Core\Helpers\Text as TextHelper ?>

<? $this->setFrameMode(true); ?>

<section>
    <div class="conteiner">
        <h1>Личный кабинет</h1>
        <div class="cabinet-head__buttons">
            <a href="/cabinet/" class="button-white">Профиль</a>
            <a href="/cabinet/orders/" class="button-white is-active">Мои заказы</a>
    </div>
    <div class="container main-unit hei4 cabinet_padding_20">
        <div class="row">
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
                                <? $order = new \Glyf\Core\HolyBean\Order($item['ORDER']['ID']); ?>
                                <? $baskets = $item['BASKET_ITEMS'] ?>
                                
                                <div class="cabinet-orders-table__item">
                                    <div class="cabinet-orders-table__row">
                                        <div class="cabinet-orders-table__cell">
                                            <?= date('d', strtotime($item['ORDER']['DATE_INSERT'])) ?>
                                            <?= TextHelper::i18nmonth(date('m', strtotime($item['ORDER']['DATE_INSERT'])), false) ?>
                                            <?= date('Y', strtotime($item['ORDER']['DATE_INSERT'])) ?>
                                        </div>
                                        <div class="cabinet-orders-table__cell">
                                            <?= $arResult['STATUSES'][$item['ORDER']['STATUS_ID']]['NAME'] ?>
                                        </div>
                                        <div class="cabinet-orders-table__cell">
                                            <span>
                                                <?= round($item['ORDER']['PRICE'], 2) ?> Р
                                            </span>
                                            <div class="cabinet-orders-table__buttons">
                                                <? if (false && $item['ORDER']['PAYED'] != 'Y') { ?>
                                                    <a class="button" href="<?= $order->getPaymentURL() ?>" target="_blank">Оплатить</a>
                                                <? } ?>
                                                <a class="button js-order-repeat" href="javascript:void(0)" data-oid="<?= $item['ORDER']['ID'] ?>">Повторить</a>
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
                                                <?= round($item['ORDER']['PRICE'], 2) ?> Р
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
    </div>
</section>