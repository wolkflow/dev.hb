<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<? use Glyf\Core\Helpers\Text as TextHelper; ?>

<div class="bl_menu_container clearfix">
    
    <div class="bl_chose_days">
        <div class="bl_chose_days_header">Выбрать дни</div>
        <div class="bl_chose_days_c">
            <div class="bl_chose_days_c_bl">
                <div class="bl_chose_days_c_top_days clearfix">
                    <span data-period="1">1 день</span>
                    <span data-period="5">5 дней</span>
                    <span data-period="7">7 дней</span>
                </div>
                <div class="bl_chose_days_c_checkboxs">
                    <? foreach ($arResult['MENU'] as $i => $menu) { ?>
                        <div class="bl_menu_checkbox">
                            <input type="checkbox" id="ch_<?= $i ?>">
                            <label>
                                <?= $menu['DATE']['DAY'] ?> / <?= $menu['DATE']['MONTH'] ?>, 
                                <?= mb_strtoupper($menu['WEEKDAY']) ?> 
                                <span></span>
                            </label>
                        </div>
                    <? } ?>
                    <div class="bl_menu_scroll">
                        <div class="bl_menu_scroll_bar">
                            <div class="bl_menu_scroll_t"></div>
                        </div>
                    </div>
                </div>
                <div class="bl_chose_days_c_descr">
                    Выберите дни, перемещая ползунок курсором мыши
                </div>
                <div class="bl_chose_days_c_bottom_price">
                    <span id="js-program-price-id">4520</span> Р
                </div>
            </div>
            <div class="bl_chose_days_btn">
                <a href="javascript:void(0)" class="button">Купить</a>
            </div>
        </div>
    </div>
    
    <div class="bl_menu_cont">
        <div class="bl_menu_cont_header">Меню</div>
        <div class="bl_menu_table">
            <? foreach ($arResult['MENU'] as $menu) { ?>
                <div class="bl_menu_table_day">
                    <div class="bl_menu_table_day_data">
                        <span><b><?= $menu['DATE']['DAY'] ?></b>/<?= $menu['DATE']['MONTH'] ?></span>
                        <span><?= $menu['WEEKDAY'] ?></span>
                    </div>
                    <div class="bl_menu_table_day_row">
                        <? foreach ($menu['MENU'] as $daymenu) { ?>
                            <div class="bl_menu_table_day_row_day">
                                <span><?= $daymenu['DAYNAME'] ?></span>
                            </div>
                             <? foreach ($daymenu as $daymenuitem) { ?>
                                <div class="bl_menu_table_day_row_inner_item">
                                    <div class="bl_menu_table_day_row_col_time">
                                        <?= $daymenuitem['TIMES']['BEGIN'] ?>.00-<?= $daymenuitem['TIMES']['FINISH'] ?>.00
                                    </div>
                                    <div class="bl_menu_table_day_row_col_name">
                                        <? foreach ($daymenuitem['ITEMS'] as $item) { ?>
                                            <p><?= $item['PRODUCT'] ?></p>
                                        <? } ?>
                                    </div>
                                    <div class="bl_menu_table_day_row_col_cal">
                                        <? foreach ($daymenuitem['ITEMS'] as $item) { ?>
                                            <p><?= $item['GRAMMAGE'] ?> г., <?= $item['ENERGY'] ?> кКал</p>
                                        <? } ?>
                                    </div>
                                </div>
                            <? } ?>
                       <? } ?>
                    </div>
                </div>
            <? } ?>
        </div>
    </div>
    
</div>