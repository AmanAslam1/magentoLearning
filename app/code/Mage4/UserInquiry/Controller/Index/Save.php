<?php

namespace Mage4\UserInquiry\Controller\Index;

use Mage4\UserInquiry\Model\DataFactory;
use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\Customer\Model\CustomerFactory;
use Magento\Customer\Model\Session;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Mail\Template\TransportBuilder;
use Magento\Framework\Translate\Inline\StateInterface;
use Magento\Store\Model\StoreManagerInterface;

class Save extends Action
{
    /**
     * @var DataFactory
     */
    private $dataFactory;

    /**
     * @var Session
     */
    private $session;

    public function __construct(
        Context                     $context,
        DataFactory                 $dataFactory,
        CustomerRepositoryInterface $customerRepositoryInterface,
        CustomerFactory             $customerFactory,
        Session                     $session,
        StoreManagerInterface       $storeManager,
        TransportBuilder            $transportBuilder,
        StateInterface              $inlineTranslation
    ) {
        $this->dataFactory = $dataFactory;
        $this->session = $session;
        $this->_customerRepositoryInterface = $customerRepositoryInterface;
        $this->_customerFactory = $customerFactory;
        $this->storeManager = $storeManager;
        $this->transportBuilder = $transportBuilder;
        $this->inlineTranslation = $inlineTranslation;

        parent::__construct($context);
    }

    public function execute()
    {

        // Email section
        $data = $this->getRequest()->getPost();
        $data = $data->toArray();
        $arr = $data['activities'];
        for ($i = 0; $i < count($arr); $i++) {
            if ($arr[$i] == 1) {
                $arr[$i] = 'Swimming';
            } elseif ($arr[$i] == 2) {
                $arr[$i] = 'Reading';
            } elseif ($arr[$i] == 3) {
                $arr[$i] = 'Sports';
            } elseif ($arr[$i] == 4) {
                $arr[$i] = 'Walking';
            } elseif ($arr[$i] == 5) {
                $arr[$i] = 'sleeping';
            }
        }
        $occupation = $data['occupation'];

        switch ($occupation) {
            case $occupation == 1:
                $occupation = 'Unemployed';
                break;

            case $occupation == 2:
                $occupation = 'Employed';
                break;

            case $occupation == 3:
                $occupation = 'Businessman';
                break;

            case $occupation == 4:
                $occupation = 'House Wife';
                break;

            default:
                "I dont know";
        }

        $arr = implode(', ', $arr);
        $dateFormat = date("d-m-Y", strtotime( $data['dob']));
        $customerName = $this->session->getCustomer()->getName();
        $customerEmail = $this->session->getCustomer()->getEmail();
        $templateOptions = ['area' => \Magento\Framework\App\Area::AREA_FRONTEND, 'store' => $this->storeManager->getStore()->getId()];
        $templateVars = [
            'name' => $customerName,
            'contact_email' => $data['contact_email'],
            'dob' => $dateFormat,
            'activities' => $arr,
            'occupation' => $occupation
        ];
        $from = ['email' => "contact@magento.com", 'name' => 'Magento'];
        $this->inlineTranslation->suspend();
        $to = $customerEmail;
        $transport = $this->transportBuilder->setTemplateIdentifier('email_template')
            ->setTemplateOptions($templateOptions)
            ->setTemplateVars($templateVars)
            ->setFrom($from)
            ->addTo($to)
            ->getTransport();
        $transport->sendMessage();
        $this->inlineTranslation->resume();

        // data saving section

        $data = $this->getRequest()->getPostValue();
        $data['name'] = $customerName;
        $arrActivities = $data['activities'];
        $arrActivities = implode(',', $arrActivities);
        $data['activities'] = $arrActivities;
        $this->dataFactory->create()
            ->setData($data)
            ->save();

        // customer attribute changer

        $customerId = $this->session->getCustomer()->getId();
        $customer = $this->_customerFactory->create()->load($customerId)->getDataModel();
        $customer->setCustomAttribute('inquiry_form_validator', "1");
        $this->_customerRepositoryInterface->save($customer);

        return $this->resultRedirectFactory->create()->setPath('checkout/index/index');
    }
}
