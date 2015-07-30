<?php

namespace TorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * InstructorsReservation
 */
class InstructorsReservation
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $idInstructor;

    /**
     * @var integer
     */
    private $idUser;

    /**
     * @var \DateTime
     */
    private $dateStart;

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
     * Set idInstructor
     *
     * @param integer $idInstructor
     * @return InstructorsReservation
     */
    public function setIdInstructor($idInstructor)
    {
        $this->idInstructor = $idInstructor;

        return $this;
    }

    /**
     * Get idInstructor
     *
     * @return integer 
     */
    public function getIdInstructor()
    {
        return $this->idInstructor;
    }

    /**
     * Set idUser
     *
     * @param integer $idUser
     * @return InstructorsReservation
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * Get idUser
     *
     * @return integer 
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * Set dateStart
     *
     * @param \DateTime $dateStart
     * @return InstructorsReservation
     */
    public function setDateStart($dateStart)
    {
        $this->dateStart = $dateStart;

        return $this;
    }

    /**
     * Get dateStart
     *
     * @return \DateTime 
     */
    public function getDateStart()
    {
        return $this->dateStart;
    }

    /**
     * Set dateStop
     *
     * @param \DateTime $dateStop
     * @return InstructorsReservation
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
