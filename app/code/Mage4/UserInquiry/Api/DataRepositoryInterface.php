<?php

namespace Mage4\UserInquiry\Api;

use Mage4\UserInquiry\Api\Data\DataInterface;

interface DataRepositoryInterface
{

    /**
     * @param DataInterface $data
     * @return mixed
     */
    public function save(DataInterface $data);


    /**
     * @param $Id
     * @return mixed
     */
    public function getById($Id);

    /**
     * @param DataInterface $data
     * @return mixed
     */
    public function delete(DataInterface $data);

    /**
     * @param $Id
     * @return mixed
     */
    public function deleteById($Id);
}
