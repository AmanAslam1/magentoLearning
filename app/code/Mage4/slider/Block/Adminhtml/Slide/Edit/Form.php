<?php
/**
 * Mage4_Slider
 *
 * @category    Scandiweb
 * @package     Mage4_Slider
 * @author      Artis Ozolins <artis@scandiweb.com>
 * @copyright   Copyright (c) 2016 Scandiweb, Ltd (http://scandiweb.com)
 */
namespace Mage4\Slider\Block\Adminhtml\Slide\Edit;

class Form extends \Magento\Backend\Block\Widget\Form\Generic
{
    /**
     * @return \Mage4\Slider\Block\Adminhtml\Slide\Edit\Form
     */
    protected function _prepareForm()
    {
        /* @var \Magento\Framework\Data\Form $form */
        $form = $this->_formFactory->create(
            ['data' => [
                'id' => 'edit_form',
                'action' => $this->getData('action'),
                'method' => 'post',
                'enctype' => 'multipart/form-data']
            ]
        );
        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }
}
