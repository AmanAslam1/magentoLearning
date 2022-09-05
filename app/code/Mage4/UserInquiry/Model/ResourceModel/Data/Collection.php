<?php

namespace Mage4\UserInquiry\Model\ResourceModel\Data;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Mage4\UserInquiry\Model\Data;
use Mage4\UserInquiry\Model\ResourceModel\Data as ItemResource;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'id';

    protected function _construct()
    {
        $this->_init(Data::class, ItemResource::class);
    }
}
