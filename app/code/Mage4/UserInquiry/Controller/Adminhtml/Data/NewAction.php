<?php

namespace Mage4\UserInquiry\Controller\Adminhtml\Data;

use Mage4\UserInquiry\Controller\Adminhtml\Data;

class NewAction extends Data
{
    /**
     * Forward to edit
     *
     * @return \Magento\Backend\Model\View\Result\Forward
     */
    public function execute()
    {
        $resultForward = $this->resultForwardFactory->create();
        return $resultForward->forward('edit');
    }
}
