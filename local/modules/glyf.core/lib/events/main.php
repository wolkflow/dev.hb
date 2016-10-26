<?php
 
namespace Glyf\Core\Events;

use Bitrix\Main\Page\Asset;
use Bitrix\Main\Application;
use Glyf\Core\System\Environment;

IncludeModuleLangFile(__FILE__);


/**
 * Обработчик событий главного модуля.
 */
class Main
{
    /**
     * Добавление главного меню.
     */
    public function OnBuildGlobal_AddMainMenu()
    {
        $menu = array(
            'global_menu_glyf.core' => array(
                'menu_id' 		=> 'glyfcore',
                'icon' 			=> 'glyf.core',
                'page_icon' 	=> 'glyf.core',
                'index_icon' 	=> 'glyf.core',
                'text' 			=> GetMessage('GLYF_CORE_GLOBAL_MENU_TEXT'),
                'title' 		=> GetMessage('GLYF_CORE_GLOBAL_MENU_TITLE'),
                'url' 			=> 'glyf.core_index.php?lang='.LANGUAGE_ID,
                'sort' 			=> 1000,
                'items_id' 		=> 'global_menu_glyf_core',
                'help_section' 	=> 'settings',
                'items' 		=> array()
            )
        );
      
        return $menu;
    }
	
	
	
	/**
     * Пролог страницы.
     */
    public function OnProlog()
    {
        if (Environment::isAdminSection()) {
            \CJSCore::Init(array('jquery_remote'));
        }
	}
    
    
    /**
     * Регистрация пользователя.
     */
    public function OnBeforeUserRegister(&$fields)
	{
        $request = Application::getInstance()->getContext()->getRequest();
        $smscode = $request->get('PHONE_CONFIRM');
        
		if (empty($smscode)) {
			$GLOBALS['APPLICATION']->ThrowException('Вы не подтвердили номер телефона');
			return false;
		}
        
        if (empty($_SESSION['SMS_CODE'])) {
			$GLOBALS['APPLICATION']->ThrowException('Код не отправлен либо устарел');
			return false;
		}
        
        if ($smscode != $_SESSION['SMS_CODE']) {
			$GLOBALS['APPLICATION']->ThrowException('Неверный код из смс');
			return false;
		}
        
        
        $fields['PERSONAL_MOBILE'] = \Glyf\Core\Drivers\SMSC::prepare($fields['PERSONAL_MOBILE']);
	}
}