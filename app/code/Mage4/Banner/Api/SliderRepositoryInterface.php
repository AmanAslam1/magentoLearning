<?php

namespace Mage4\Banner\Api;

use Mage4\Banner\Api\Slider\SliderInterface;

interface SliderRepositoryInterface
{

    /**
     * @param SliderInterface $data
     * @return mixed
     */
    public function save(SliderInterface $data);


    /**
     * @param $Id
     * @return mixed
     */
    public function getById($Id);

    /**
     * @param SliderInterface $data
     * @return mixed
     */
    public function delete(SliderInterface $data);

    /**
     * @param $Id
     * @return mixed
     */
    public function deleteById($Id);
}
