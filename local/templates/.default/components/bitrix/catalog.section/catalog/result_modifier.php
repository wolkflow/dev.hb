<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use \Glyf\Core\HolyBean\Program;

$programs = Program::getList(array('filter' => array('!PROPERTY_INDIVIDUAL' => 'Y')));

$arResult['TYPES'] = array();
foreach ($programs as $program) {
    $arResult['TYPES'][$program->getID()] = $program->getTitle();
}