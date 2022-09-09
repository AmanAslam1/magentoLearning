<?php

namespace Mage4\Banner\Controller\Adminhtml\Index;

use Magento\Backend\App\Action\Context;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;
use Magento\Backend\Model\View\Result\ForwardFactory;
use Mage4\Banner\Api\SliderRepositoryInterface;
use Magento\Ui\Component\MassAction\Filter;
use Mage4\Banner\Controller\Adminhtml\Data;
use Mage4\Banner\Model\Slider as SliderModel;
use Mage4\Banner\Model\ResourceModel\Slider\CollectionFactory;

abstract class MassAction extends Data
{
    /**
     * @var Filter
     */
    protected $filter;

    /**
     * @var CollectionFactory
     */
    protected $collectionFactory;

    /**
     * @var SliderRepositoryInterface
     */
    protected $sliderRepository;

    /**
     * @var ForwardFactory
     */
    protected $resultForwardFactory;

    /**
     * @var string
     */
    protected $successMessage;

    /**
     * @var string
     */
    protected $errorMessage;

    /**
     * MassAction constructor.
     *
     * @param Filter $filter
     * @param Registry $registry
     * @param SliderRepositoryInterface $sliderRepository
     * @param PageFactory $resultPageFactory
     * @param Context $context
     * @param CollectionFactory $collectionFactory
     * @param ForwardFactory $resultForwardFactory
     * @param $successMessage
     * @param $errorMessage
     */
    public function __construct(
        Filter $filter,
        Registry $registry,
        PageFactory $resultPageFactory,
        SliderRepositoryInterface $sliderRepository,
        Context $context,
        CollectionFactory $collectionFactory,
        ForwardFactory $resultForwardFactory,
        $successMessage,
        $errorMessage
    ) {
        $this->filter               = $filter;
        $this->sliderRepository     = $sliderRepository;
        $this->collectionFactory    = $collectionFactory;
        $this->resultForwardFactory = $resultForwardFactory;
        $this->successMessage       = $successMessage;
        $this->errorMessage         = $errorMessage;
        parent::__construct($registry, $sliderRepository, $resultPageFactory, $resultForwardFactory, $context);
    }

    /**
     * @param SliderModel $data
     * @return mixed
     */
    abstract protected function massAction(SliderModel $data);

    /**
     * @return \Magento\Framework\Controller\Result\Redirect;
     */
    public function execute()
    {
        try {
            $collection = $this->filter->getCollection($this->collectionFactory->create());
            $collectionSize = $collection->getSize();
            foreach ($collection as $data) {
                $this->massAction($data);
            }
            $this->messageManager->addSuccessMessage(__($this->successMessage, $collectionSize));
        } catch (LocalizedException $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
        } catch (\Exception $e) {
            $this->messageManager->addExceptionMessage($e, __($this->errorMessage));
        }
        $redirectResult = $this->resultRedirectFactory->create();
        $redirectResult->setPath('slider/index/index');
        return $redirectResult;
    }
}
