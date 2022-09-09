<?php

namespace Mage4\Banner\Controller\Adminhtml\Index;

use Mage4\Banner\Api\Slider\SliderInterface;
use Mage4\Banner\Api\Slider\SliderInterfaceFactory;
use Mage4\Banner\Api\SliderRepositoryInterface;
use Mage4\Banner\Controller\Adminhtml\Data;
use Magento\Backend\App\Action\Context;
use Magento\Backend\Model\View\Result\ForwardFactory;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Message\Manager;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;

class SliderSave extends Data
{
    /**
     * @var Manager
     */
    protected $messageManager;

    /**
     * @var SliderRepositoryInterface
     */
    protected $sliderRepository;

    /**
     * @var SliderInterfaceFactory
     */
    protected $sliderFactory;

    /**
     * @var DataObjectHelper
     */
    protected $dataObjectHelper;

    public function __construct(
        Registry $registry,
        SliderRepositoryInterface $sliderRepository,
        PageFactory $resultPageFactory,
        ForwardFactory $resultForwardFactory,
        Manager $messageManager,
        SliderInterfaceFactory $sliderFactory,
        DataObjectHelper $dataObjectHelper,
        Context $context
    ) {
        $this->messageManager   = $messageManager;
        $this->sliderFactory      = $sliderFactory;
        $this->sliderRepository   = $sliderRepository;
        $this->dataObjectHelper  = $dataObjectHelper;
        parent::__construct($registry, $sliderRepository, $resultPageFactory, $resultForwardFactory, $context);
    }

    /**
     * Save action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $sliderGeneral = $this->getRequest()->getPostValue('general');
        $sliderMobile = $this->getRequest()->getPostValue('mobileView');
        $sliderData = array_merge($sliderGeneral,$sliderMobile);
        $resultRedirect = $this->resultRedirectFactory->create();
        if ($sliderData) {
            $params = $this->getRequest()->getParams();
            $id = $params['general']['id'] ?? null;
            if ($id) {
                $model = $this->sliderRepository->getById($id);
            } else {
                $model = $this->sliderFactory->create();
            }

            try {
                $this->dataObjectHelper->populateWithArray($model, $sliderData, SliderInterface::class);
                $model->setData($sliderData);
                $this->sliderRepository->save($model);
                $this->messageManager->addSuccessMessage(__('You saved this data.'));
                $this->_getSession()->setFormData(false);
                if ($this->getRequest()->getParam('back')) {
                    return $resultRedirect->setPath('*/*/edit', ['id' => $model->getId(), '_current' => true]);
                }
                return $resultRedirect->setPath('*/index/index');
            } catch (\Magento\Framework\Exception\LocalizedException $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
            } catch (\RuntimeException $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addException($e, __('Something went wrong while saving the data.'));
            }

            $this->_getSession()->setFormData($sliderData);
            return $resultRedirect->setPath('*/*/edit', ['id' => $this->getRequest()->getParam('id')]);
        }
        return $resultRedirect->setPath('*/*/');
    }
}
