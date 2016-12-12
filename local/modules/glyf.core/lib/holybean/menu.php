<?php 

namespace Glyf\Core\HolyBean;

use \Glyf\Core\HolyBean\MenuGood;

class Menu extends \Glyf\Core\System\IBlockModel
{
    const IBLOCK_ID = IBLOCK_MENU_ID;
    
    const DAYTIME_MORNING = 'MORNING';
    const DAYTIME_MIDDAY  = 'MIDDAY';
    const DAYTIME_EVENING = 'EVENING';
    
    
    public function getGoodsStruct()
    {
        $this->load();
        
        return $this->data['PROPS']['GOODS']['VALUE'];
    }
    
    
    public function getGoods()
    {
        $this->load();
        
        $structs = $this->getGoodsStruct();
        $goodIDs = array();
        foreach ($structs as $struct) {
            $goodIDs []= (int) $struct['ELEMENT'];
        }
        $goodIDs = array_filter(array_unique($goodIDs));
        
        if (empty($goodIDs)) {
            return array();
        }
        
        $items = MenuGood::getList(array(
            'filter' => array('IBLOCK_ID' => IBLOCK_MENU_ID, 'ID' => $goodIDs)
        ));
        
        return $items;
    }
    
    
    public function getMenu()
    {
        $this->load();
        
        $structs = $this->getGoodsStruct();
        $goods   = $this->getGoods();
        $result  = array();
        foreach ($structs as $struct) {
            $time = (int) $struct['TIME_BEGIN'];
            
            if ($time <= HOURS_MORNING) {
                $daytime = self::DAYTIME_MORNING;
            } elseif (HOURS_MORNING < $time && $time <= HOURS_MIDDAY) {
                $daytime = self::DAYTIME_MIDDAY;
            } elseif ($time > HOURS_MIDDAY) {
                $daytime = self::DAYTIME_EVENING;
            }
            
            $good = $goods[$struct['ELEMENT']];
            
            if (is_object($good)) {
                $result []= array(
                    'DAYTIME'     => $daytime,
                    'DAYNAME'     => self::getDayTimeTitle($daytime),
                    'TIME_BEGIN'  => $struct['TIME_BEGIN'],
                    'TIME_FINISH' => $struct['TIME_FINISH'],
                    'PRODUCT'     => $good->getTitle(),
                    'GRAMMAGE'    => $good->getGrammage(),
                    'ENERGY'      => $good->getEnergy(),
                );
            }
        }
        $result = $this->group($result);
        
        return $result;
    }
    
    
    public function group($items)
    {
        $result = array();
        
        foreach ($items as $item) {
            $result[$item['DAYTIME']][$item['TIME_BEGIN'].'-'.$item['TIME_FINISH']]['DAYNAME'] = $item['DAYNAME'];
            $result[$item['DAYTIME']][$item['TIME_BEGIN'].'-'.$item['TIME_FINISH']]['TIMES'] = array(
                'BEGIN'  => $item['TIME_BEGIN'], 
                'FINISH' => $item['TIME_FINISH']
            );
            $result[$item['DAYTIME']][$item['TIME_BEGIN'].'-'.$item['TIME_FINISH']]['ITEMS'] []= $item;
        }
        return $result;
    }
    
    
    public static function getDayTimeTitle($code)
    {
        $daytimes = array(
            'MORNING'      => 'Утро',
            'MIDDAY'       => 'День',
            'EVENING'      => 'Вечер',
        );
        
        return $daytimes[$code];
    }
}