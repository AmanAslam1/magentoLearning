<?php

namespace Mage4\Banner\Controller\Adminhtml\Index;

use Mage4\Banner\Controller\Adminhtml\Data;
use Magento\Backend\Model\View\Result\Forward;

class NewAction extends Data
{
    /**
     * Forward to edit
     *
     * @return Forward
     */
    public function execute()
    {
        $resultForward = $this->resultForwardFactory->create();
        return $resultForward->forward('edit');
    }
}
