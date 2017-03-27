<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reponse
 *
 * @ORM\Table(name="reponse")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ReponseRepository")
 */
class Reponse
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
     * @ORM\Column(name="texte", type="string", length=255)
     */
    private $texte;

    /**
     * @var bool
     *
     * @ORM\Column(name="verif", type="boolean")
     */
    private $verif;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="Question",inversedBy="reponses")
     * @ORM\JoinColumn(name="fk_question", referencedColumnName="id"))
     */
    private $question;


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
     * Set texte
     *
     * @param string $texte
     *
     * @return Reponse
     */
    public function setTexte($texte)
    {
        $this->texte = $texte;

        return $this;
    }

    /**
     * Get texte
     *
     * @return string
     */
    public function getTexte()
    {
        return $this->texte;
    }

    /**
     * Set verif
     *
     * @param boolean $verif
     *
     * @return Reponse
     */
    public function setVerif($verif)
    {
        $this->verif = $verif;

        return $this;
    }

    /**
     * Get verif
     *
     * @return bool
     */
    public function getVerif()
    {
        return $this->verif;
    }

    /**
     * Set question
     *
     * @param string $question
     *
     * @return Reponse
     */
    public function setQuestion($question)
    {
        $this->question = $question;

        return $this;
    }

    /**
     * Get question
     *
     * @return string
     */
    public function getQuestion()
    {
        return $this->question;
    }
}

