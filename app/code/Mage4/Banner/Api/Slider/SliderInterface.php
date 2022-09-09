<?php

namespace Mage4\Banner\Api\Slider;

interface SliderInterface
{
    /**
     * Constants for keys of data array. Identical to the name of the getter in snake case
     */
    const ID           = 'id';
    const SLIDERTITLE  = 'sliderTitle';
    const SLIDERSTATUS = 'sliderStatus';
    const NAVSTATUS    = 'navStatus';
    const PAGINATION   = 'pagination';
    const AUTOPLAY     = 'autoplay';
    const SLIDEBY      = 'slideBy';
    const SLIDEVIEW    = 'slideView';
    const POSITION     = 'position';
    const MNAVSTATUS   = 'mNavStatus';
    const MPAGINATION  = 'mPagination';
    const MAUTOPLAY    = 'mAutoplay';
    const MSLIDEBY     = 'mSlideBy';
    const MSLIDEVIEW   = 'mSlideView';


    /**
     * Get ID
     *
     * @return int|null
     */
    public function getId();

    /**
     * Set ID
     *
     * @param $id
     * @return SliderInterface
     */
    public function setId($id);

    /**
     * Get sliderTitle
     *
     * @return string
     */
    public function getSliderTitle();

    /**
     * Set sliderTitle
     *
     * @param $sliderTitle
     * @return mixed
     */
    public function setSliderTitle($sliderTitle);

    /**
     * Get SliderStatus
     *
     * @return string
     */
    public function getSliderStatus();

    /**
     * Set SliderStatus
     *
     * @param $sliderStatus
     * @return boolean
     */
    public function setSliderStatus($sliderStatus);

    /**
     * Get NavStatus
     *
     * @return string
     */
    public function getNavStatus();

    /**
     * set NavStatus
     *
     * @param $navStatus
     * @return boolean
     */
    public function setNavStatus($navStatus);

    /**
     * Get Pagination
     *
     * @return string
     */
    public function getPagination();

    /**
     * Set Pagination
     *
     * @param $pagination
     * @return boolean
     */
    public function setPagination($pagination);

    /**
     * Get Autoplay
     *
     * @return string
     */
    public function getAutoplay();

    /**
     * Set Autoplay
     *
     * @param $autoplay
     * @return boolean
     */
    public function setAutoplay($autoplay);

    /**
     * Get SlideBy
     *
     * @return string
     */
    public function getSlideBy();

    /**
     * Set SlideBy
     *
     * @param $slideBy
     * @return int
     */
    public function setSlideBy($slideBy);

    /**
     * Get SlideView
     *
     * @return string
     */
    public function getSlideView();

    /**
     * Set SlideView
     *
     * @param $slideView
     * @return int
     */
    public function setSlideView($slideView);

    /**
     * Get Position
     *
     * @return string
     */
    public function getPosition();

    /**
     * Set Position
     *
     * @param $position
     * @return int
     */
    public function setPosition($position);

    /**
     * Get MNavStatus
     *
     * @return string
     */
    public function getMnavStatus();

    /**
     * Set MNavStatus
     *
     * @param $mNavStatus
     * @return boolean
     */
    public function setMnavStatus($mNavStatus);

    /**
     * Get MPagination
     *
     * @return string
     */
    public function getMpagination();

    /**
     * Set MPagination
     *
     * @param $mPagination
     * @return boolean
     */
    public function setMpagination($mPagination);

    /**
     * Get MAutoplay
     *
     * @return string
     */
    public function getMautoplay();

    /**
     * Set MAutoplay
     *
     * @param $mAutoplay
     * @return boolean
     */
    public function setMautoplay($mAutoplay);

    /**
     * Get MSlideBy
     *
     * @return string
     */
    public function getMslideBy();

    /**
     * Set MSlideBy
     *
     * @param $mSlideBy
     * @return int
     */
    public function setMslideBy($mSlideBy);

    /**
     * Get MSlideView
     *
     * @return string
     */
    public function getMslideView();

    /**
     * Set MSlideView
     *
     * @param $mSlideView
     * @return int
     */
    public function setMslideView($mSlideView);
}
