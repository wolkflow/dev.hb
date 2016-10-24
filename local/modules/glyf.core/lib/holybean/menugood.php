<?php 

namespace Glyf\Core\HolyBean;


class MenuGood extends \Glyf\Core\System\IBlockModel
{
    const IBLOCK_ID = IBLOCK_MENU_GOODS_ID;
    
    
    public function getTitle()
    {
        $this->load();
        
        return $this->data['NAME'];
    }
    
    
    public function getGrammage()
    {
        $this->load();
        
        return $this->data['PROPS']['GRAMMAGE']['VALUE'];
    }
    
    
    public function getEnergy()
    {
        $this->load();
        
        return $this->data['PROPS']['ENERGY']['VALUE'];
    }
}