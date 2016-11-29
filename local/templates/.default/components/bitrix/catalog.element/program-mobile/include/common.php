<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<? use Glyf\Core\Helpers\Text as TextHelper; ?>

<script>
	$(function() {
		var panel = $('.panelMenu');

		$('#js-panel-menu-button-id, .js-panel-menu-toggle').on('click', function (e) {
			e.preventDefault();
			panel.toggleClass('in');
		});

		$(window).resize(function () {
			var w = $(window).width();
			if (w > 767) {
				panel.removeClass('in').removeAttr('style');
			}
		});
	});
</script>


<div id="js-panel-menu-button-id" class="panel-popup-button">
   <div class="panel-popup-button-content">
        Выбор дней
   </div>
</div>

<div class="panelMenu">
    <div class="panelMenu-close js-panel-menu-toggle"></div>
    
    <div class="bl_chose_days">
        <div class="bl_chose_days_header">
            Выбрать дни
        </div>
        <div class="bl_chose_days_c">
            <div class="bl_chose_days_c_bl">
                <div class="bl_chose_days_c_top_days clearfix">
                    <span class="js-variant" data-period="1" data-product="<?= $arResult['VARIANTS'][PROGRAM_DAYS_1]->getID() ?>" data-price="<?= $arResult['VARIANTS'][PROGRAM_DAYS_1]->getPrice() ?>">1 день</span>
                    <span class="js-variant" data-period="5" data-product="<?= $arResult['VARIANTS'][PROGRAM_DAYS_5]->getID() ?>" data-price="<?= $arResult['VARIANTS'][PROGRAM_DAYS_5]->getPrice() ?>">5 дней</span>
                    <span class="js-variant" data-period="7" data-product="<?= $arResult['VARIANTS'][PROGRAM_DAYS_7]->getID() ?>" data-price="<?= $arResult['VARIANTS'][PROGRAM_DAYS_7]->getPrice() ?>">7 дней</span>
                </div>
                <div class="bl_chose_days_c_checkboxs">
                    <? foreach ($arResult['MENU'] as $i => $menu) { ?>
                        <div class="bl_menu_checkbox">
                            <input class="js-checked-day" type="checkbox" name="days[]" value="<?= $menu['DATE']['DAY'] ?>/<?= $menu['DATE']['MONTH'] ?> <?= $menu['WEEKDAY'] ?>" data-date="<?= date('d.m.Y', $menu['TIME']) ?>" />
                            <label>
                                <?= $menu['DATE']['DAY'] ?> / <?= $menu['DATE']['MONTH'] ?>, 
                                <?= mb_strtoupper($menu['WEEKDAY']) ?> 
                                <span></span>
                            </label>
                        </div>
                    <? } ?>
                    <div class="bl_menu_scroll scroll_1_day">
                        <div class="bl_menu_scroll_bar"></div>
                    </div>
                </div>
                <div class="bl_chose_days_c_descr">
                    Выберите дни, перемещая ползунок курсором мыши
                </div>
                <div class="bl_chose_days_c_bottom_price">
                    <span id="js-program-price-id"><?= $arResult['VARIANTS'][PROGRAM_DAYS_1]->getPrice() ?></span>
                     <span class="rub">₽</span>
                </div>
            </div>
            <div class="bl_chose_days_btn">
                <a href="javascript:void(0)" class="button js-buy-button-id">Купить</a>
            </div>
        </div>
    </div>
</div>

<div class="container main-unit">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="bl_menu_cont">
                <div class="bl_menu_cont_header">Меню</div>
                <div class="bl_menu_table">
                    <? foreach ($arResult['MENU'] as $menu) { ?>
                        <div class="js-selected-day bl_menu_table_day">
                            <div class="bl_menu_table_day_data data_xs_1">
                                <span><b><?= $menu['DATE']['DAY'] ?></b>/<?= $menu['DATE']['MONTH'] ?></span>
                                <span><?= $menu['WEEKDAY'] ?></span>
                            </div>
                            <div class="menu_class_0">
                            <? foreach ($menu['MENU'] as $daycode => $daymenu) { ?>
                                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12 menu_class_1">
                                        <div class="bl_menu_table_day_row_day_title menu_class_3">
                                            <span><?= Glyf\Core\HolyBean\Menu::getDayTimeTitle($daycode) ?></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-11 col-md-11 col-sm-11 col-xs-12 border_xs_1">
                                    <? foreach ($daymenu as $daymenuitem) { ?>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 menu_class_2">
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 menu_class_4 menu_color2">
                                                <?= $daymenuitem['TIMES']['BEGIN'] ?>.00-<?= $daymenuitem['TIMES']['FINISH'] ?>.00
                                            </div>
                                            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12 menu_class_4 menu_color1">
                                                <? foreach ($daymenuitem['ITEMS'] as $item) { ?>
                                                    <p><?= $item['PRODUCT'] ?></p>
                                                <? } ?>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 menu_class_5 menu_color2">
                                                <? foreach ($daymenuitem['ITEMS'] as $item) { ?>
                                                    <p><?= $item['GRAMMAGE'] ?> г., <?= $item['ENERGY'] ?> кКал</p>
                                                <? } ?>
                                            </div>
                                        </div>
                                    <? } ?>
                                    </div>
                           <? } ?>
                            </div>
                        </div>
                    <? } ?>
                </div>
            </div>
        </div>
    </div>
</div>

