<?php

if (\Bitrix\Main\Loader::includeModule('glyf.core')) {
	AddEventHandler('main', 'OnBeforeUserRegister', array('\Glyf\Core\Events\Main', 'OnBeforeUserRegister'));
}