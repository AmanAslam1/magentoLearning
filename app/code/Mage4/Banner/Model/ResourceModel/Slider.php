<?php

namespace Mage4\Banner\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Slider extends AbstractDb
{

    protected function _construct()
    {
        $this->_init('mage4_slider', 'id');
    }
}
