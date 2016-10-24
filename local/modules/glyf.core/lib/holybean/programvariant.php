<?php 

namespace Glyf\Core\HolyBean;

\Bitrix\Main\Loader::includeModule('catalog');

class ProgramVariant extends \Glyf\Core\System\ProductModel
{
    const IBLOCK_ID = IBLOCK_PROGRAMS_VARIANTS_ID;
    
    
    public function getDaysCount()
    {
        $this->load();
        
        return intval($this->data['PROPERTIES']['DAYS']['VALUE']);
    }
}