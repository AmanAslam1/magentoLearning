<?php
namespace Mage4\UserInquiry\Observer;

use Magento\Customer\Model\Session;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\ActionFlag;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\App\ResponseFactory;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\UrlInterface;

class Redirect implements ObserverInterface
{
    protected $_responseFactory;
    /**
     * @var UrlInterface
     */
    private $url;

    /**
     * @var ActionFlag
     */
    private $actionFlag;

    /**
     * @var  Session
     */
    private $session;

    /**
     * @var  ScopeConfigInterface
     */
    private $scopeConfig;

    public function __construct(
        ResponseFactory $responseFactory,
        UrlInterface $url,
        ActionFlag $actionFlag,
        Session $session,
        ScopeConfigInterface $scopeConfig
    ) {
        $this->_responseFactory = $responseFactory;
        $this->actionFlag = $actionFlag;
        $this->url = $url;
        $this->session = $session;
        $this->scopeConfig = $scopeConfig;
    }
    public function execute(Observer $observer)
    {
        $config_check = $this->scopeConfig->isSetFlag('inquiry/general/enable');
        if ($this->session->isLoggedIn()) {
            $customerData = $this->session->getCustomer();
            $customerInquiryFormValidator = $customerData->getInquiryFormValidator();
            if ($config_check && $customerInquiryFormValidator == 0) {
                //   Stop further processing if your condition is met
                $this->actionFlag->set('', Action::FLAG_NO_DISPATCH, true);
                // then in last redirect
                $observer->getControllerAction()->getResponse()->setRedirect($this->url->getUrl("inquiry/index/index"));
            }
        }
    }
}
