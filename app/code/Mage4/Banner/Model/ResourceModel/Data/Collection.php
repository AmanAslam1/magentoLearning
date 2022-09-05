<?php

namespace Mage4\Banner\Model\ResourceModel\Data;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Mage4\Banner\Model\Banner;
use Mage4\Banner\Model\ResourceModel\Data as ItemResource;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'id';

    protected function _construct()
    {
        $this->_init(Banner::class, ItemResource::class);
    }
}
