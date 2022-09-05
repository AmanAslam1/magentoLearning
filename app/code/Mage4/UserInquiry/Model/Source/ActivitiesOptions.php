<?php

namespace Mage4\UserInquiry\Model\Source;

use Magento\Framework\Option\ArrayInterface;

class ActivitiesOptions implements ArrayInterface
{
    public function toOptionArray()
    {
        $options = $this->getOptions();
        $formatedOptions = [];
        foreach ($options as $key => $option) {
            array_push($formatedOptions, ['value' => $key, 'label' => $option]);
        }
        return $formatedOptions;
    }

    public function getOptions()
    {
        return [
            '' => __('None'),
            '1' => __('Swimming'),
            '2' => __('Reading'),
            '3' => __('Sports'),
            '4' => __('Walking'),
            '5' => __('Sleeping')
        ];
    }
}
