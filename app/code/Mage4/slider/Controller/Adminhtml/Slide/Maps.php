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

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Maps extends \Magento\Backend\App\Action
{
    public function __construct(Context $context, \Magento\Framework\View\Result\LayoutFactory $layoutFactory)
    {
        parent::__construct($context);
        $this->layoutFactory = $layoutFactory;
    }

    public function execute()
    {
        $resultPage = $this->layoutFactory->create();

        return $resultPage;
    }
}
