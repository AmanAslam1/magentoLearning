<?php
/**
 * Mage4_Slider
 *
 * @category    Scandiweb
 * @package     Mage4_Slider
 * @author      Artis Ozolins <artis@scandiweb.com>
 * @copyright   Copyright (c) 2016 Scandiweb, Ltd (http://scandiweb.com)
 */
namespace Mage4\Slider\Block;

use Magento\Framework\View\Element\Template;

class Slider extends \Magento\Catalog\Block\Product\AbstractProduct
{
    /**
     * @var string $_template
     */
    protected $_template = 'Mage4_Slider::slider.phtml';

    /**
     * @var \Mage4\Slider\Model\SliderFactory $_sliderFactory
     */
    protected $_sliderFactory;

    /**
     * @var \Mage4\Slider\Model\ResourceModel\Slide\CollectionFactory $_slideCollectionFactory
     */
    protected $_slideCollectionFactory;

    /**
     * @var \Mage4\Slider\Model\ResourceModel\Map\CollectionFactory $_mapCollectionFactory
     */
    protected $_mapCollectionFactory;

    /**
     * @var \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $_productCollectionFactory
     */
    protected $_productCollectionFactory;

    /**
     * @var \Mage4\Slider\Model\Slide $_slider
     */
    protected $_slider;

    /**
     * @var \Mage4\Slider\Model\ResourceModel\Slide\Collection $_slideCollection
     */
    protected $_slideCollection;

    /**
     * @var \Mage4\Slider\Model\ResourceModel\Map\Collection $_mapCollection
     */
    protected $_mapCollection;

    /**
     * @var \Magento\Catalog\Model\ResourceModel\Product\Collection $_productCollection
     */
    protected $_productCollection;

    /**
     * @var \Magento\Cms\Model\Template\FilterProvider
     */
    protected $_filterProvider;

    /**
     * Slider constructor.
     * @param \Magento\Catalog\Block\Product\Context $context
     * @param \Mage4\Slider\Model\SliderFactory $sliderFactory
     * @param \Mage4\Slider\Model\ResourceModel\Slide\CollectionFactory $slideCollectionFactory
     * @param \Mage4\Slider\Model\ResourceModel\Map\CollectionFactory $mapCollectionFactory
     * @param \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory
     * @param \Magento\Cms\Model\Template\FilterProvider $filterProvider
     * @param array $data
     */
    public function __construct(
        \Magento\Catalog\Block\Product\Context $context,
        \Mage4\Slider\Model\SliderFactory $sliderFactory,
        \Mage4\Slider\Model\ResourceModel\Slide\CollectionFactory $slideCollectionFactory,
        \Mage4\Slider\Model\ResourceModel\Map\CollectionFactory $mapCollectionFactory,
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory,
        \Magento\Cms\Model\Template\FilterProvider $filterProvider,
        array $data
    )
    {
        $this->_sliderFactory = $sliderFactory;
        $this->_slideCollectionFactory = $slideCollectionFactory;
        $this->_mapCollectionFactory = $mapCollectionFactory;
        $this->_productCollectionFactory = $productCollectionFactory;
        $this->_filterProvider = $filterProvider;

        parent::__construct($context, $data);
    }

    /**
     * @param $content
     * @return string
     */
    public function filterWysiwygContent($content) {
        return $this->_filterProvider->getBlockFilter()->filter($content);
    }

    /**
     * @return int
     */
    public function getSliderId()
    {
       return (int) $this->getData('slider_id');
    }

    /**
     * @return int
     */
    public function getSliderTitle()
    {
        return $this->getData('title');
    }

    /**
     * @return \Mage4\Slider\Model\Slider|bool
     */
    public function getSlider()
    {
        if ($this->getSliderId()) {
            $slider = $this->_sliderFactory->create();
            $slider->load($this->getSliderId());

            if ($slider->getSliderId()) {
                $this->_slider = $slider;

                return $this->_slider;
            }
        } else if ($this->getSliderTitle()) {
            $slider = $this->_sliderFactory->create();
            $slider->load($this->getSliderTitle(), 'title');

            if ($slider->getId()) {
                $this->_slider = $slider;

                return $this->_slider;
            }
        }

        return false;
    }

    /**
     * @return \Mage4\Slider\Model\ResourceModel\Slide\Collection
     */
    public function getSlides()
    {
        if (!$this->_slideCollection) {
            $this->_slideCollection = $this->_slideCollectionFactory->create();
            $this->_slideCollection
                ->addSliderFilter($this->getSlider()->getId())
                ->addStoreFilter()
                ->addDateFilter()
                ->addIsActiveFilter()
                ->addPositionOrder();
        }

        return $this->_slideCollection;
    }

    /**
     * @return \Mage4\Slider\Model\ResourceModel\Slide\Collection
     */
    public function getMaps()
    {
        if (!$this->_mapCollection) {
            $this->_mapCollection = $this->_mapCollectionFactory->create();
            $this->_mapCollection
                ->addSliderFilter($this->getSlider()->getId())
                ->addIsActiveFilter();
        }

        return $this->_mapCollection;
    }

    /**
     * @param  int $slideId
     * @return array
     */
    public function getSlideMaps($slideId)
    {
        $maps = [];

        foreach ($this->getMaps() as $map) {
            /* @var \Mage4\Slider\Model\Map $map */
            if ($map->getSlideId() == $slideId) {
                $maps[] = $map;
            }
        }

        return $maps;
    }

    /**
     * @return \Magento\Catalog\Model\ResourceModel\Product\Collection|bool
     */
    public function getMapProducts()
    {
        if (!$this->getMaps()->count()) {
            return false;
        }

        if (!$this->_productCollection) {

            $productIds = [];

            foreach ($this->getMaps() as $map) {
                /* @var \Mage4\Slider\Model\Map $map */
                $productIds[] = $map->getProductId();
            }

            $this->_productCollection = $this->_productCollectionFactory->create();
            $this->_productCollection->addIdFilter($productIds);
            $this->_addProductAttributesAndPrices($this->_productCollection);
        }

        return $this->_productCollection;
    }

    /**
     * @param  int $productId
     * @return \Magento\Catalog\Model\Product|bool
     */
    public function getMapProduct($productId)
    {
        if ($this->getMapProducts()) {
            return $this->getMapProducts()->getItemById((int) $productId);
        }

        return false;
    }

    /**
     * @param  \Mage4\Slider\Model\Map $map
     * @return string
     */
    public function getMapUrl($map)
    {
        if ($product = $this->getMapProduct($map->getProductId())) {
            return $this->getProductUrl($product);
        }

        return '';
    }

    /**
     * @param  \Mage4\Slider\Model\Slide $slide
     * @return string
     */
    public function getSlideTextClass($slide)
    {
        $class = 'a-left';

        if ($slide->getSlideTextPosition() == 1) {
            $class = 'a-right';
        }

        if ($slide->getSlideTextPosition() == 2) {
            $class = 'a-center';
        }

        return $class;
    }

    /**
     * @param  \Mage4\Slider\Model\Slide $slide
     * @return string
     */
    public function getSlideTextClass2($slide)
    {
        $class = 'a-left';

        if ($slide->getSlideTextPosition2() == 1) {
            $class = 'a-right';
        }

        if ($slide->getSlideTextPosition2() == 2) {
            $class = 'a-center';
        }

        return $class;
    }

    /**
     * @param  \Mage4\Slider\Model\Slide $slide
     * @return string
     */
    public function getSlideTextClass3($slide)
    {
        $class = 'a-left';

        if ($slide->getSlideTextPosition3() == 1) {
            $class = 'a-right';
        }

        if ($slide->getSlideTextPosition3() == 2) {
            $class = 'a-center';
        }

        return $class;
    }

    /**
     * @return string
     */
    protected function _toHtml()
    {
        if (!$this->getSlider() || !$this->getSlider()->getIsActive()) {
            return '';
        }

        return parent::_toHtml();
    }
}
