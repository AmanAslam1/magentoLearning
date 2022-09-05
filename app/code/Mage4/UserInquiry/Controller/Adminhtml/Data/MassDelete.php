<?php

namespace Mage4\UserInquiry\Controller\Adminhtml\Data;

use Mage4\UserInquiry\Model\Data;

class MassDelete extends MassAction
{
    /**
     * @param Data $data
     * @return $this
     */
    protected function massAction(Data $data)
    {
        $this->dataRepository->delete($data);
        return $this;
    }
}
