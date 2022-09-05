<?php

namespace Mage4\UserInquiry\Block;

use Mage4\UserInquiry\Model\Data;
use Mage4\UserInquiry\Model\ResourceModel\Data\CollectionFactory;
use Mage4\UserInquiry\Model\Source\ActivitiesOptions;
use Mage4\UserInquiry\Model\Source\OccupationOptions;
use Magento\Framework\View\Element\Template;

class InquiryForm extends Template
{
    private $activitiesOptions;
    private $occupationOptions;
    private $collectionFactory;

    public function __construct(
        Template\Context  $context,
        CollectionFactory $collectionFactory,
        OccupationOptions $occupationOptions,
        ActivitiesOptions $activitiesOptions,
        array             $data = []
    ) {
        $this->collectionFactory = $collectionFactory;
        $this->occupationOptions = $occupationOptions;
        $this->activitiesOptions = $activitiesOptions;
        parent::__construct($context, $data);
    }

    /**
     * @return Data[]
     */

    public function getOccupationOptions()
    {
        return $this->occupationOptions->getOptions();
    }

    public function getActiviitesOptions()
    {
        return $this->activitiesOptions->getOptions();
    }

    public function getFormAction()
    {
        return $this->getUrl('inquiry/index/save', ['_secure' => true]);
    }
}
