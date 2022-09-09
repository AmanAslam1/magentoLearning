<?php

namespace Mage4\Banner\Model;

use Mage4\Banner\Api\Slider\SliderInterface;
use Mage4\Banner\Model\ResourceModel\Slider as ResourceModel;
use Magento\Framework\Model\AbstractModel;

class Slider extends AbstractModel implements SliderInterface
{
    protected function _construct()
    {
        $this->_init(ResourceModel::class);
    }

    /**
     * Get ID
     *
     * @return int|null
     */
    public function getId()
    {
        return $this->getData(SliderInterface::ID);
    }
    /**
     * Set ID
     *
     * @param $id
     * @return $this
     */
    public function setId($id)
    {
        return $this->setData(SliderInterface::ID, $id);
    }

    /**
     * Get sliderTitle
     *
     * @return string
     */
    public function getSliderTitle()
    {
        return $this->getData(SliderInterface::SLIDERTITLE);
    }

    /**
     * Set sliderTitle
     *
     * @param $sliderTitle
     * @return $this
     */
    public function setSliderTitle($sliderTitle)
    {
        return $this->setData(SliderInterface::SLIDERTITLE, $sliderTitle);
    }

    /**
     * Get SliderStatus
     *
     * @return string
     */
    public function getSliderStatus()
    {
        return $this->getData(SliderInterface::SLIDERSTATUS);
    }

    /**
     * Set SliderStatus
     *
     * @param $sliderStatus
     * @return $this
     */
    public function setSliderStatus($sliderStatus)
    {
        return $this->setData(SliderInterface::SLIDERSTATUS, $sliderStatus);
    }

    /**
     * Get NavStatus
     *
     * @return string
     */
    public function getNavStatus()
    {
        return $this->getData(SliderInterface::NAVSTATUS);
    }

    /**
     * set NavStatus
     *
     * @param $navStatus
     * @return $this
     */
    public function setNavStatus($navStatus)
    {
        return $this->setData(SliderInterface::NAVSTATUS, $navStatus);
    }

    /**
     * Get Pagination
     *
     * @return string
     */
    public function getPagination()
    {
        return $this->getData(SliderInterface::PAGINATION);
    }

    /**
     * Set Pagination
     *
     * @param $pagination
     * @return $this
     */
    public function setPagination($pagination)
    {
        return $this->setData(SliderInterface::PAGINATION, $pagination);
    }

    /**
     * Get Autoplay
     *
     * @return string
     */
    public function getAutoplay()
    {
        return $this->getData(SliderInterface::AUTOPLAY);
    }

    /**
     * Set Autoplay
     *
     * @param $autoplay
     * @return $this
     */
    public function setAutoplay($autoplay)
    {
        return $this->setData(SliderInterface::AUTOPLAY, $autoplay);
    }

    /**
     * Get SlideBy
     *
     * @return string
     */
    public function getSlideBy()
    {
        return $this->getData(SliderInterface::SLIDEBY);
    }

    /**
     * Set SlideBy
     *
     * @param $slideBy
     * @return $this
     */
    public function setSlideBy($slideBy)
    {
        return $this->setData(SliderInterface::SLIDEBY, $slideBy);
    }

    /**
     * Get SlideView
     *
     * @return string
     */
    public function getSlideView()
    {
        return $this->getData(SliderInterface::SLIDEVIEW);
    }

    /**
     * Set SlideView
     *
     * @param $slideView
     * @return $this
     */
    public function setSlideView($slideView)
    {
        return $this->setData(SliderInterface::SLIDEVIEW, $slideView);
    }

    /**
     * Get Position
     *
     * @return string
     */
    public function getPosition()
    {
        return $this->getData(SliderInterface::POSITION);
    }

    /**
     * Set Position
     *
     * @param $position
     * @return $this
     */
    public function setPosition($position)
    {
        return $this->setData(SliderInterface::POSITION, $position);
    }

    /**
     * Get MNavStatus
     *
     * @return string
     */
    public function getMnavStatus()
    {
        return $this->getData(SliderInterface::MNAVSTATUS);
    }

    /**
     * Set MNavStatus
     *
     * @param $mNavStatus
     * @return $this
     */
    public function setMnavStatus($mNavStatus)
    {
        return $this->setData(SliderInterface::MNAVSTATUS, $mNavStatus);
    }

    /**
     * Get MPagination
     *
     * @return string
     */
    public function getMpagination()
    {
        return $this->getData(SliderInterface::MPAGINATION);
    }

    /**
     * Set MPagination
     *
     * @param $mPagination
     * @return $this
     */
    public function setMpagination($mPagination)
    {
        return $this->setData(SliderInterface::MPAGINATION, $mPagination);
    }

    /**
     * Get MAutoplay
     *
     * @return string
     */
    public function getMautoplay()
    {
        return $this->getData(SliderInterface::MAUTOPLAY);
    }

    /**
     * Set MAutoplay
     *
     * @param $mAutoplay
     * @return $this
     */
    public function setMautoplay($mAutoplay)
    {
        return $this->setData(SliderInterface::MAUTOPLAY, $mAutoplay);
    }

    /**
     * Get MSlideBy
     *
     * @return string
     */
    public function getMslideBy()
    {
        return $this->getData(SliderInterface::MSLIDEBY);
    }

    /**
     * Set MSlideBy
     *
     * @param $mSlideBy
     * @return $this
     */
    public function setMslideBy($mSlideBy)
    {
        return $this->setData(SliderInterface::MSLIDEBY, $mSlideBy);
    }

    /**
     * Get MSlideView
     *
     * @return string
     */
    public function getMslideView()
    {
        return $this->getData(SliderInterface::MSLIDEVIEW);
    }

    /**
     * Set MSlideView
     *
     * @param $mSlideView
     * @return $this
     */
    public function setMslideView($mSlideView)
    {
        return $this->setData(SliderInterface::MSLIDEVIEW, $mSlideView);
    }
}
