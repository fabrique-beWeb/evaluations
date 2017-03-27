<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Evaluation
 *
 * @ORM\Table(name="evaluation")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EvaluationRepository")
 */
class Evaluation
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
     * @ORM\ManyToOne(targetEntity="Apprenant")
     * @ORM\JoinColumn(name="fk_apprenant", referencedColumnName="id"))
     */
    private $apprenant;

    /**
     * @var \stdClass
     *
     * @ORM\ManyToOne(targetEntity="Question")
     * @ORM\JoinColumn(name="fk_question", referencedColumnName="id"))
     */
    private $question;

    /**
     * @var int
     *
     * @ORM\Column(name="resultat", type="integer", nullable=true)
     */
    private $resultat;


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
     * Set apprenant
     *
     * @param string $apprenant
     *
     * @return Evaluation
     */
    public function setApprenant($apprenant)
    {
        $this->apprenant = $apprenant;

        return $this;
    }

    /**
     * Get apprenant
     *
     * @return string
     */
    public function getApprenant()
    {
        return $this->apprenant;
    }

    /**
     * Set question
     *
     * @param \stdClass $question
     *
     * @return Evaluation
     */
    public function setQuestion($question)
    {
        $this->question = $question;

        return $this;
    }

    /**
     * Get question
     *
     * @return \stdClass
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * Set resultat
     *
     * @param integer $resultat
     *
     * @return Evaluation
     */
    public function setResultat($resultat)
    {
        $this->resultat = $resultat;

        return $this;
    }

    /**
     * Get resultat
     *
     * @return int
     */
    public function getResultat()
    {
        return $this->resultat;
    }
}

