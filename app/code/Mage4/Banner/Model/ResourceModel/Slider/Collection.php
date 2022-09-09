<?php

namespace Mage4\Banner\Model\ResourceModel\Slider;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Mage4\Banner\Model\Slider;
use Mage4\Banner\Model\ResourceModel\Slider as SliderResource;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'id';

    protected function _construct()
    {
        $this->_init(Slider::class, SliderResource::class);
    }
}
