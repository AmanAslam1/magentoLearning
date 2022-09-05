<?php
/**
 * Mage4_Slider
 *
 * @category    Scandiweb
 * @package     Mage4_Slider
 * @author      Artis Ozolins <artis@scandiweb.com>
 * @copyright   Copyright (c) 2016 Scandiweb, Ltd (http://scandiweb.com)
 */
namespace Mage4\Slider\Model;

use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\Model\AbstractModel;

/**
 * @method int getSlideId()
 * @method \Mage4\Slider\Model\Slider setSlideId(int $value)
 * @method int getSliderId()
 * @method \Mage4\Slider\Model\Slider setSliderId(int $value)
 * @method string getTitle()
 * @method \Mage4\Slider\Model\Slider setTitle(string $value)
 * @method string getDesktopImage()
 * @method \Mage4\Slider\Model\Slider setDesktopImage(string $value)
 * @method string getMobileImage()
 * @method \Mage4\Slider\Model\Slider setMobileImage(string $value)
 * @method string getDesktopImage2()
 * @method \Mage4\Slider\Model\Slider setDesktopImage2(string $value)
 * @method string getMobileImage2()
 * @method \Mage4\Slider\Model\Slider setMobileImage2(string $value)
 * @method string getDesktopImage3()
 * @method \Mage4\Slider\Model\Slider setDesktopImage3(string $value)
 * @method string getMobileImage3()
 * @method \Mage4\Slider\Model\Slider setMobileImage3(string $value)
 * @method bool getIsActive()
 * @method \Mage4\Slider\Model\Slider setIsActive(bool $value)
 * @method int getPosition()
 * @method \Mage4\Slider\Model\Slider setPosition(int $value)
 * @method string getStartTime()
 * @method \Mage4\Slider\Model\Slider setStartTime(string $value)
 * @method string getEndTime()
 * @method \Mage4\Slider\Model\Slider setEndTime(string $value)
 * @method string getSlideLink()
 * @method \Mage4\Slider\Model\Slider setSlideLink(string $value)
 * @method string getSlideLink2()
 * @method \Mage4\Slider\Model\Slider setSlideLink2(string $value)
 * @method string getSlideLink3()
 * @method \Mage4\Slider\Model\Slider setSlideLink3(string $value)
 * @method string getDisplayTitle()
 * @method \Mage4\Slider\Model\Slider setDisplayTitle(string $value)
 * @method string getDisplayTitle2()
 * @method \Mage4\Slider\Model\Slider setDisplayTitle2(string $value)
 * @method string getDisplayTitle3()
 * @method \Mage4\Slider\Model\Slider setDisplayTitle3(string $value)
 * @method string getSlideText()
 * @method \Mage4\Slider\Model\Slider setSlideText(string $value)
 * @method string getSlideText2()
 * @method \Mage4\Slider\Model\Slider setSlideText2(string $value)
 * @method string getSlideText3()
 * @method \Mage4\Slider\Model\Slider setSlideText3(string $value)
 * @method string getEmbedCode()
 * @method \Mage4\Slider\Model\Slider setEmbedCode(string $value)
 * @method string getEmbedCode2()
 * @method \Mage4\Slider\Model\Slider setEmbedCode2(string $value)
 * @method string getEmbedCode3()
 * @method \Mage4\Slider\Model\Slider setEmbedCode3(string $value)
 * @method int getSlideTextPosition()
 * @method \Mage4\Slider\Model\Slider setSlideTextPosition(int $value)
 * @method int getSlideTextPosition2()
 * @method \Mage4\Slider\Model\Slider setSlideTextPosition2(int $value)
 * @method int getSlideTextPosition3()
 * @method \Mage4\Slider\Model\Slider setSlideTextPosition3(int $value)
 * @method string getSlideWidthClass()
 * @method \Mage4\Slider\Model\Slider setSlideWidthClass(string $value)
 */
class Slide extends AbstractModel implements IdentityInterface
{
    /**
     * Slide cache tag
     */
    const CACHE_TAG = 'sw_sld';

    /**
     * @var string
     */
    protected $_cacheTag = 'scandiweb_slider_slide';

    /**
     * Prefix of model events names
     *
     * @var string
     */
    protected $_eventPrefix = 'scandiweb_slider_slide';

    /* @var \Magento\Store\Model\StoreManagerInterface $_storeManager */
    protected $_storeManager;

    public function _construct()
    {
        $this->_init('Mage4\Slider\Model\ResourceModel\Slide');
    }

    /**
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param \Mage4\Slider\Model\ResourceModel\Slide $resource
     * @param \Mage4\Slider\Model\ResourceModel\Slide\Collection $resourceCollection
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        \Mage4\Slider\Model\ResourceModel\Slide $resource = null,
        \Mage4\Slider\Model\ResourceModel\Slide\Collection $resourceCollection = null,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        array $data = []
    ) {
        $this->_storeManager = $storeManager;
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }

    /**
     * Return unique ID(s) for each object in system
     *
     * @return array
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId(), Slider::CACHE_TAG . '_' . $this->getSliderId()];
    }

    /**
     * @param  bool $secure
     * @return string|bool
     */
    public function getDesktopImageUrl($secure = false)
    {
        if (!$this->getDesktopImage()) {
            return false;
        }

        $base = $this->_storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA, $secure);

        return $base . $this->getDesktopImage();
    }

    /**
     * @param  bool $secure
     * @return string|bool
     */
    public function getMobileImageUrl($secure = false)
    {
        if (!$this->getMobileImage()) {
            return false;
        }

        $base = $this->_storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA, $secure);

        return $base . $this->getMobileImage();
    }

    /**
     * @param  bool $secure
     * @return string|bool
     */
    public function getDesktopImageUrl2($secure = false)
    {
        if (!$this->getDesktopImage2()) {
            return false;
        }

        $base = $this->_storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA, $secure);

        return $base . $this->getDesktopImage2();
    }

    /**
     * @param  bool $secure
     * @return string|bool
     */
    public function getMobileImageUrl2($secure = false)
    {
        if (!$this->getMobileImage2()) {
            return false;
        }

        $base = $this->_storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA, $secure);

        return $base . $this->getMobileImage2();
    }

    /**
     * @param  bool $secure
     * @return string|bool
     */
    public function getDesktopImageUrl3($secure = false)
    {
        if (!$this->getDesktopImage3()) {
            return false;
        }

        $base = $this->_storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA, $secure);

        return $base . $this->getDesktopImage3();
    }

    /**
     * @param  bool $secure
     * @return string|bool
     */
    public function getMobileImageUrl3($secure = false)
    {
        if (!$this->getMobileImage3()) {
            return false;
        }

        $base = $this->_storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA, $secure);

        return $base . $this->getMobileImage3();
    }

    /**
     * Will return an array of widths the original image should be resized to
     * @return array
     */
    protected function getSupportedSizes()
    {
        return [375, 768, 1024];
    }

    /**
     * Will resize images to various sizes for later use in <img> stcsets
     * @param $originalImagePath
     * @throws \Exception
     */
    public function prepareImagesForSrcset($originalImagePath)
    {
        $image = new \claviska\SimpleImage();
        $fileNameParts = \pathinfo($originalImagePath);

        foreach ($this->getSupportedSizes() as $size) {
            $newFileName = $fileNameParts['dirname'] . '/' .
                $fileNameParts['filename'] . '-' . $size . 'w.' . $fileNameParts['extension'];

            $imageInfo = getimagesize($originalImagePath);

            $image
                ->fromFile($originalImagePath)
                ->resize($size)
                ->toFile($newFileName, $imageInfo['mime']);
        }
    }
}
