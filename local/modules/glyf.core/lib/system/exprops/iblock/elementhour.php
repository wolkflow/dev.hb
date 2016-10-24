<?php

namespace Glyf\Core\System\Exprops\IBlock;

use Bitrix\Main\Localization\Loc;

Loc::loadMessages('/var/www/vhosts/holybean.dev.wolkflow.com/httpdocs/bitrix/modules/iblock/classes/general/prop_element_list.php');


class ElementHour
{
	const FIELD_TIME    = 'TIME';
	const FIELD_ELEMENT = 'ELEMENT';
	
	
    public function GetUserTypeDescription()
    {
        return array(
            'PROPERTY_TYPE'  => 'S',
            'USER_TYPE'      => 'elementhour',
            'DESCRIPTION'    => 'Привязка к элементам с часами',
            'CheckFields'           => array(__CLASS__, 'CheckFields'),
            'GetLength'             => array(__CLASS__, 'GetLength'),
            'GetPublicViewHTML'     => array(__CLASS__, 'GetFieldView'),
            'GetPropertyFieldHtml'  => array(__CLASS__, 'GetEditField'),
            'GetPublicEditHTML'     => array(__CLASS__, 'GetEditField'),
			'GetAdminListViewHTML'  => array(__CLASS__, 'GetAdminListViewHTML'),
			'PrepareSettings' 		=> array(__CLASS__, 'PrepareSettings'),
			'ConvertToDB' 			=> array(__CLASS__, 'ConvertToDB'),
			'ConvertFromDB' 		=> array(__CLASS__, 'ConvertFromDB'),
			// 'GetSettingsHTML'		=> array(__CLASS__, 'GetSettingsHTML'),
        );
    }
	
	
	/**
     * Проверка корректности значения свойства.
     *
     * @param $property
     * @param $value
     * @return array
     */
    public function CheckFields($property, $value)
    {
		$errors = array();
		
        return $errors;
    }
	
	
    /**
     * Фактическую длину значения свойства.
	 *
     * @param $property
     * @param $value
     * @return int
     */
    public function GetLength($property, $value)
    {
        return strlen(json_encode($value['VALUE']));
    }
	
	
    /**
     * Вернуть HTML отображения элемента управления для редактирования значений свойства в административной части
     * @param $property
     * @param $value
     * @param $element
     * @return string
     */
    public function GetEditField($property, $value, $element)
    {
		// print_r($property);
		// print_r($value);
		// print_r($element);
		 
		$iblockitem = array();
		if (!empty($value['VALUE']['ELEMENT'])) {
			$iblockitem = \CIBlockElement::getByID($value['VALUE']['ELEMENT'])->fetch();
		}
		
		$html  = '<table class="js-element-hour-type" cellspacing="5" style="border: 1px dotted #a4b9cc; border-radius: 10px; margin: 3px 3px 10px 3px; padding: 3px;">';
		$html .= '<tr>';
		$html .= '<td><select name="' . $element['VALUE'] . '[TIME]">';
		for ($i = 0; $i <= 24; $i++) {
			$select = ($value['VALUE']['TIME'] == $i) ? ('selected') : ('');
			$html .= '<option value="' . $i . '" ' . $select . '> ' . str_pad($i, 2, '0', STR_PAD_LEFT) . ' </option>';
		}
		// <script src="https://yastatic.net/jquery/2.1.4/jquery.min.js" type="text/javascript"></script>
		$html .= '</select></td>';
		$html .= '<td>
					<input type="text" name="'.$element['VALUE'].'[ELEMENT]" id="'.$element['VALUE'].'[ELEMENT]" value="'.$value['VALUE']['ELEMENT'].'" size="5" />
					<input type="button" value="..." onclick="jsUtils.OpenWindow(\'iblock_element_search.php?lang='.LANGUAGE_ID.'&amp;IBLOCK_ID='.IBLOCK_MENU_GOODS_ID.'&amp;n='.urlencode($element['VALUE'].'[ELEMENT]').'\', 800, 600);" />
					<span id="sp_'.$element['VALUE'].'[ELEMENT]" style="margin: 0 5px;">&nbsp;'.$iblockitem['NAME'].'</span>
					<!--a href="javascript:void(0)" onclick="javascript: if ($(\'.js-element-hour-type\').length <= 1) return; $(this).closest(\'.js-element-hour-type\').closest(\'tr\').remove();" style="font-size: 22px; cursor: pointer; color: #808a8e; text-decoration: none;">&times;</a-->
				</td>
			</tr>
		</table>';
	
		return $html;
    }

	
	/**
     * Вернуть HTML отображения значения свойства в списке элементов административной части
     * @param $property
     * @param $value
     * @param $strHTMLControlName
     * @return mixed
     */
	public function GetAdminListViewHTML($property, $value, $strHTMLControlName)
    {
        return json_encode($value);
    }
	
	
    /**
     * Вернуть HTML отображения значения свойства в списке элементов административной части
     * @param $property
     * @param $value
     * @param $htmlElement
     * @return mixed
     */
    public function GetFieldView($property, $value, $htmlElement)
    {
        return '';
    }
	
	
	
	/**
	 * Настройки для типа данных.
	 *
	 * @param array $fields
	 * @return array
	 */
	public function PrepareSettings($fields)
    {
        return $fields['USER_TYPE_SETTINGS'];
    }
	
	
	/**
	 * Конвертация при сохранении в БД.
	 */
	public function ConvertToDB($property, $value)
    {
		$value['VALUE'] = array_filter($value['VALUE'], function($item) { return (!empty($item['ELEMENT'])); });
		
		if (empty($value['VALUE'])) {
			return '';
		}
		$value = json_encode($value);
		
		return $value;
	}
	
	
	/**
	 * Конвертация при получении из БД.
	 */
	public function ConvertFromDB($property, $value)
	{
		$value = json_decode($value['VALUE'], true);
		
		return $value;
	}
	
	
	
	
	public static function GetSettingsHTML($arFields,$strHTMLControlName, &$arPropertyFields)
	{
		$arPropertyFields = array(
			"HIDE" => array("ROW_COUNT", "COL_COUNT","MULTIPLE_CNT"),
			'USER_TYPE_SETTINGS_TITLE' => Loc::getMessage('BT_UT_EAUTOCOMPLETE_SETTING_TITLE'),
		);

		$arSettings = static::PrepareSettings($arFields);

		return '<tr>
		<td>'.Loc::getMessage('BT_UT_EAUTOCOMPLETE_SETTING_VIEW').'</td>
		<td>'.SelectBoxFromArray($strHTMLControlName["NAME"].'[VIEW]', static::GetPropertyViewsList(true),htmlspecialcharsbx($arSettings['VIEW'])).'</td>
		</tr>
		<tr>
		<td>'.Loc::getMessage('BT_UT_EAUTOCOMPLETE_SETTING_SHOW_ADD').'</td>
		<td>'.InputType('checkbox',$strHTMLControlName["NAME"].'[SHOW_ADD]','Y',htmlspecialcharsbx($arSettings["SHOW_ADD"])).'</td>
		</tr>
		<tr>
		<td>'.Loc::getMessage('BT_UT_EAUTOCOMPLETE_SETTING_IBLOCK_MESS').'</td>
		<td>'.InputType('checkbox',$strHTMLControlName["NAME"].'[IBLOCK_MESS]','Y',htmlspecialcharsbx($arSettings["IBLOCK_MESS"])).'</td>
		</tr>
		<tr>
		<td>'.Loc::getMessage('BT_UT_EAUTOCOMPLETE_SETTING_MAX_WIDTH').'</td>
		<td><input type="text" name="'.$strHTMLControlName["NAME"].'[MAX_WIDTH]" value="'.(int)$arSettings['MAX_WIDTH'].'">&nbsp;'.Loc::getMessage('BT_UT_EAUTOCOMPLETE_SETTING_COMMENT_MAX_WIDTH').'</td>
		</tr>
		<tr>
		<td>'.Loc::getMessage('BT_UT_EAUTOCOMPLETE_SETTING_MIN_HEIGHT').'</td>
		<td><input type="text" name="'.$strHTMLControlName["NAME"].'[MIN_HEIGHT]" value="'.(int)$arSettings['MIN_HEIGHT'].'">&nbsp;'.Loc::getMessage('BT_UT_EAUTOCOMPLETE_SETTING_COMMENT_MIN_HEIGHT').'</td>
		</tr>
		<tr>
		<td>'.Loc::getMessage('BT_UT_EAUTOCOMPLETE_SETTING_MAX_HEIGHT').'</td>
		<td><input type="text" name="'.$strHTMLControlName["NAME"].'[MAX_HEIGHT]" value="'.(int)$arSettings['MAX_HEIGHT'].'">&nbsp;'.Loc::getMessage('BT_UT_EAUTOCOMPLETE_SETTING_COMMENT_MAX_HEIGHT').'</td>
		</tr>
		<tr>
		<td>'.Loc::getMessage('BT_UT_EAUTOCOMPLETE_SETTING_BAN_SYMBOLS').'</td>
		<td><input type="text" name="'.$strHTMLControlName["NAME"].'[BAN_SYM]" value="'.htmlspecialcharsbx($arSettings['BAN_SYM']).'"></td>
		</tr>
		<tr>
		<td>'.Loc::getMessage('BT_UT_EAUTOCOMPLETE_SETTING_REP_SYMBOL').'</td>
		<td>'.SelectBoxFromArray($strHTMLControlName["NAME"].'[REP_SYM]', static::GetReplaceSymList(true),htmlspecialcharsbx($arSettings['REP_SYM'])).'&nbsp;<input type="text" name="'.$strHTMLControlName["NAME"].'[OTHER_REP_SYM]" size="1" maxlength="1" value="'.$arSettings['OTHER_REP_SYM'].'"></td>
		</tr>
		';
	}
	
}