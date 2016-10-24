<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$arResult['STATUSES'] = array();

$result = CSaleStatus::GetList();
while ($item = $result->fetch()) {
    $arResult['STATUSES'][$item['ID']] = $item;
}