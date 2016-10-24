<?php 

namespace Glyf\Core\HolyBean;

use Glyf\Core\HolyBean\ProgramVariant;

class Program extends \Glyf\Core\System\IBlockModel
{
    const IBLOCK_ID = IBLOCK_PROGRAMS_ID;
    
    
    
    public function getTitle()
    {
        $this->load();
        
        return $this->get('NAME');
    }
    
    
    public function getVariants()
    {
        $this->load();
        
        $variants = ProgramVariant::getList(array(
            'filter' => array('IBLOCK_ID' => IBLOCK_PROGRAMS_VARIANTS_ID, 'PROPERTY_CML2_LINK' => $this->getID())
        ));
        
        $result = array();
        foreach ($variants as $variant) {;
            $result[$variant->getDaysCount()] = $variant;
        }
        unset($variants);
        
        return $result;
    }
}