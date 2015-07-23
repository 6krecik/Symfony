<?php

namespace TorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ReservationTor
 */
class ReservationTor
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $userId;

    /**
     * @var \DateTime
     */
    private $dataStart;

    /**
     * @var \DateTime
     */
    private $dateStop;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set userId
     *
     * @param integer $userId
     * @return ReservationTor
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return integer 
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set dataStart
     *
     * @param \DateTime $dataStart
     * @return ReservationTor
     */
    public function setDataStart($dataStart)
    {
        $this->dataStart = $dataStart;

        return $this;
    }

    /**
     * Get dataStart
     *
     * @return \DateTime 
     */
    public function getDataStart()
    {
        return $this->dataStart;
    }

    /**
     * Set dateStop
     *
     * @param \DateTime $dateStop
     * @return ReservationTor
     */
    public function setDateStop($dateStop)
    {
        $this->dateStop = $dateStop;

        return $this;
    }

    /**
     * Get dateStop
     *
     * @return \DateTime 
     */
    public function getDateStop()
    {
        return $this->dateStop;
    }
}
