<?php 

namespace Glyf\Core\System;

\Bitrix\Main\Loader::includeModule('catalog');

class ProductModel extends \Glyf\Core\System\IBlockModel
{
    
    /**
	 * Загрузка данных элемента.
	 *
	 * @param bool $force
	 * @return array
	 */
	public function load($force = false)
	{
		if (empty($this->data) || $force) {
            $this->data = \CCatalogProduct::GetByIDEx($this->getID());
            $this->data['PRICE'] = $this->data['PRICES'][PRICE_TYPE_DEFAULT]['PRICE'];
		}
	}
    
    
    /**
     * получение цены.
     */
    public function getPrice()
    {
        $this->load();
        
        return floatval($this->data['PRICE']);
    }
}