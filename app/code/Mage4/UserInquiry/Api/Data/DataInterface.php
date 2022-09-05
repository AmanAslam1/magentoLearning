<?php

namespace Mage4\UserInquiry\Api\Data;

interface DataInterface
{
    /**
     * Constants for keys of data array. Identical to the name of the getter in snake case
     */
    const ID                    = 'id';
    const NAME             = 'name';
    const EMAIL                 = 'contact_email';
    const DOB                 = 'dob';
    const ACTIVITIES                 = 'activities';
    const OCCUPATION          = 'occupaiton';


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
     * @return DataInterface
     */
    public function setId($id);

    /**
     * Get Name
     *
     * @return string
     */
    public function getName();

    /**
     * Set Name
     *
     * @param $name
     * @return mixed
     */
    public function setName($name);

    /**
     * Get Email
     *
     * @return string
     */
    public function getEmail();

    /**
     * Set Email
     *
     * @param $contact_email
     * @return mixed
     */
    public function setEmail($contact_email);

    /**
     * Get activities
     *
     * @return string
     */
    public function getActivities();

    /**
     * set Activities
     *
     * @param $activities
     * @return DataInterface
     */
    public function setActivities($activities);

    /**
     * Get Occupation
     *
     * @return string
     */
    public function getOccupation();

    /**
     * Set Occupation
     *
     * @param $occupation
     * @return mixed
     */
    public function setOccupation($occupation);

    /**
     * Get dob
     *
     * @return string
     */
    public function getDob();

    /**
     * Set dob
     *
     * @param $dob
     * @return mixed
     */
    public function setDob($dob);
}
