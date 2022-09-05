<?php
/**
 * Mage4_Slider
 *
 * @category    Scandiweb
 * @package     Mage4_Slider
 * @author      Artis Ozolins <artis@scandiweb.com>
 * @copyright   Copyright (c) 2016 Scandiweb, Ltd (http://scandiweb.com)
 */
namespace Mage4\Slider\Model\ResourceModel\Slider;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    public function _construct()
    {
        $this->_init('Mage4\Slider\Model\Slider', 'Mage4\Slider\Model\ResourceModel\Slider');
    }

    /**
     * @return $this
     */
    protected function _afterLoadData()
    {
        parent::_afterLoadData();

        $collection = clone $this;

        if (count($collection)) {
            $this->_eventManager->dispatch('scandiweb_slider_slider_collection_load_after', ['collection' => $collection]);
        }

        return $this;
    }
}
