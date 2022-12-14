<?php
/**
 * Mage4_Slider
 *
 * @category    Scandiweb
 * @package     Mage4_Slider
 * @author      Artis Ozolins <artis@scandiweb.com>
 * @copyright   Copyright (c) 2016 Scandiweb, Ltd (http://scandiweb.com)
 */
namespace Mage4\Slider\Controller\Adminhtml\Slide;

class Delete extends \Magento\Backend\App\Action
{
    /**
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Mage4_Slider::slide_delete');
    }

    /**
     * @return \Magento\Backend\Model\View\Result\Redirect
     */
    public function execute()
    {
        $id = $this->getRequest()->getParam('slide_id');
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        if (!$id) {
            // display error message
            $this->messageManager->addError(__('We can\'t find slide to delete.'));
            // go to grid
            return $resultRedirect->setPath('*/*/');
        }

        try {
            /* @var \Mage4\Slider\Model\Slide $model */
            $model = $this->_objectManager->create('Mage4\Slider\Model\Slide');
            $model->load($id);
            $model->delete();

            $this->messageManager->addSuccess(__('The slide has been deleted.'));

            return $resultRedirect->setPath('slideradmin/slider/edit', ['slider_id' => $model->getSliderId()]);
        } catch (\Exception $e) {
            $this->messageManager->addError($e->getMessage());
            return $resultRedirect->setPath('*/*/edit', ['slide_id' => $id]);
        }
    }
}
