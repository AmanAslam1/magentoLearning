<?php

namespace Mage4\UserInquiry\Model;

use Magento\Framework\Model\AbstractModel;
use Mage4\UserInquiry\Api\Data\DataInterface;

class Data extends AbstractModel implements DataInterface
{
    /**
     * Cache tag
     */
    const CACHE_TAG = 'Mage4_UserInquiry';

    /**
     * Initialise resource model
     * @codingStandardsIgnoreStart
     */
    protected function _construct()
    {
        // @codingStandardsIgnoreEnd
        $this->_init(\Mage4\UserInquiry\Model\ResourceModel\Data::class);
    }

    /**
     * Get cache identities
     *
     * @return array
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    /**
     * Get Id
     *
     * @return string
     */
    public function getId()
    {
        return $this->getData(DataInterface::ID);
    }

    /**
     * Set Id
     *
     * @param $id
     * @return $this
     */
    public function setId($id)
    {
        return $this->setData(DataInterface::ID, $id);
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->getData(DataInterface::NAME);
    }

    /**
     * Set name
     *
     * @param $name
     * @return $this
     */
    public function setName($name)
    {
        return $this->setData(DataInterface::NAME, $name);
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->getData(DataInterface::EMAIL);
    }

    /**
     * Set email
     *
     * @param $contact_email
     * @return $this
     */
    public function setEmail($contact_email)
    {
        return $this->setData(DataInterface::EMAIL, $contact_email);
    }

    /**
     * Get DOB
     *
     * @return string
     */
    public function getDob()
    {
        return $this->getData(DataInterface::DOB);
    }

    /**
     * Set DOB
     *
     * @param $dob
     * @return $this
     */
    public function setDob($dob)
    {
        return $this->setData(DataInterface::DOB, $dob);
    }

    /**
     * Get activities
     *
     * @return string
     */
    public function getActivities()
    {
        return $this->getData(DataInterface::ACTIVITIES);
    }

    /**
     * Set activities
     *
     * @param $activities
     * @return $this
     */
    public function setActivities($activities)
    {
        return $this->setData(DataInterface::ACTIVITIES, $activities);
    }

    /**
     * Get occupation
     *
     * @return string
     */
    public function getOccupation()
    {
        return $this->getData(DataInterface::OCCUPATION);
    }

    /**
     * Set occupation
     *
     * @param $occupaiton
     * @return $this
     */
    public function setOccupation($occupaiton)
    {
        return $this->setData(DataInterface::OCCUPATION, $occupaiton);
    }
}
