<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use \Glyf\Core\HolyBean\Program;
use \Glyf\Core\HolyBean\MenuList;
use \Glyf\Core\HolyBean\Menu;
use  Glyf\Core\Helpers\Text as TextHelper;

if ($arResult['PROPERTIES']['INDIVIDUAL']['VALUE'] != 'Y') {
    
    $program  = new Program($arResult['ID']);
    $menulist = new MenuList($program);
    
    $menudays = $menulist->getDayList();
    
    $arResult['MENU'] = array();
    
    foreach ($menudays as $i => $menuday) {
        $time = strtotime('+' . ($i + MENU_DAYS_OFFSET) . ' days');
        
        $arResult['MENU'] []= array(
            'DATE'    => array('DAY' => date('d', $time), 'MONTH' => date('m', $time)),
            'MENU'    => $menuday->getMenu(),
            'WEEKDAY' => TextHelper::i18nday(date('N', $time), true),
        );
    }
    
    $arResult['VARIANTS'] = $program->getVariants();
}