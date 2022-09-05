<?php

namespace Mage4\UserInquiry\Model\ResourceModel;

use Magento\Framework\Model\AbstractModel;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Magento\Framework\Model\ResourceModel\Db\Context;

class Data extends AbstractDb
{

    protected function _construct()
    {
        $this->_init('Mage4_UserInquiry', 'id');
    }
}
