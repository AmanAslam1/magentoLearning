<?php

namespace Mage4\Banner\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Data extends AbstractDb
{

    protected function _construct()
    {
        $this->_init('Mage4_Banner', 'id');
    }
}
