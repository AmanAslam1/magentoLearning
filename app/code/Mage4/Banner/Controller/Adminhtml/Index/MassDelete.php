<?php

namespace Mage4\Banner\Controller\Adminhtml\Index;

use Mage4\Banner\Model\Slider;

class MassDelete extends MassAction
{
    /**
     * @param Slider $data
     * @return $this
     */
    protected function massAction(Slider $data)
    {
        $this->sliderRepository->delete($data);
        return $this;
    }
}
