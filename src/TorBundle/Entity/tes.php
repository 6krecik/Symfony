<?php

namespace TorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * tes
 */
class tes
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $item;


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
     * Set item
     *
     * @param string $item
     * @return tes
     */
    public function setItem($item)
    {
        $this->item = $item;

        return $this;
    }

    /**
     * Get item
     *
     * @return string 
     */
    public function getItem()
    {
        return $this->item;
    }
}
