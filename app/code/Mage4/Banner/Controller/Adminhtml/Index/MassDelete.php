<?php

namespace Mage4\Banner\Controller\Adminhtml\Index;

use Mage4\Banner\Model\Banner;

class MassDelete extends MassAction
{
    /**
     * @param Banner $data
     * @return $this
     */
    protected function massAction(Banner $data)
    {
        $this->dataRepository->delete($data);
        return $this;
    }
}
