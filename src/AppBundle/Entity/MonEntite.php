<?php

namespace AppBundle\Entity;

use JsonSerializable;

/**
 * MonEntite
 *
 * @ORM\Table(name="mon_entite")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MonEntiteRepository")
 */
class MonEntite implements JsonSerializable
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="textAffiche", type="string", length=255)
     */
    private $textAffiche;

    /**
     * @var bool
     *
     * @ORM\Column(name="juste", type="boolean")
     */
    private $juste;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set textAffiche
     *
     * @param string $textAffiche
     *
     * @return MonEntite
     */
    public function setTextAffiche($textAffiche)
    {
        $this->textAffiche = $textAffiche;

        return $this;
    }

    /**
     * Get textAffiche
     *
     * @return string
     */
    public function getTextAffiche()
    {
        return $this->textAffiche;
    }

    /**
     * Set juste
     *
     * @param boolean $juste
     *
     * @return MonEntite
     */
    public function setJuste($juste)
    {
        $this->juste = $juste;

        return $this;
    }

    /**
     * Get juste
     *
     * @return bool
     */
    public function getJuste()
    {
        return $this->juste;
    }

    public function jsonSerialize() {
    }

}

