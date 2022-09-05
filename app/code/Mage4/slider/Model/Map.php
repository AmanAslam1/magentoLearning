<?php
/**
 * Mage4_Slider
 *
 * @category    Scandiweb
 * @package     Mage4_Slider
 * @author      Artis Ozolins <artis@scandiweb.com>
 * @copyright   Copyright (c) 2016 Scandiweb, Ltd (http://scandiweb.com)
 */
namespace Mage4\Slider\Model;

/**
 * @method int getMapId()
 * @method \Mage4\Slider\Model\Map setMapId(int $value)
 * @method int getSlideId()
 * @method \Mage4\Slider\Model\Map setSlideId(int $value)
 * @method string getTitle()
 * @method \Mage4\Slider\Model\Map setTitle(string $value)
 * @method string getCoordinates()
 * @method \Mage4\Slider\Model\Map setCoordinates(string $value)
 * @method bool getIsActive()
 * @method \Mage4\Slider\Model\Map setIsActive(bool $value)
 * @method int getProductId()
 * @method \Mage4\Slider\Model\Map setProductId(int $value)
 */
class Map extends \Magento\Framework\Model\AbstractModel
{
    public function _construct()
    {
        $this->_init('Mage4\Slider\Model\ResourceModel\Map');
    }
}
