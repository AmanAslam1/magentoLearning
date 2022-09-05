<?php
/**
 * Mage4_Slider
 *
 * @category    Scandiweb
 * @package     Mage4_Slider
 * @author      Artis Ozolins <artis@scandiweb.com>
 * @copyright   Copyright (c) 2016 Scandiweb, Ltd (http://scandiweb.com)
 */
namespace Mage4\Slider\Block\Adminhtml;

class Slide extends \Magento\Backend\Block\Widget\Grid\Container
{
    protected function _construct()
    {
        $this->_blockGroup = 'Mage4_Slider';
        $this->_controller = 'adminhtml_slide';

        parent::_construct();

        if ($this->getRequest()->getParam('ajax') || !$this->_request->getParam('slider_id')) {
            $this->removeButton('add');
        }
    }

    /**
     * @return string
     */
    public function getCreateUrl()
    {
        return $this->getUrl(
            'slideradmin/slide/new',
            ['slider_id' => $this->_request->getParam('slider_id')]
        );
    }
}
