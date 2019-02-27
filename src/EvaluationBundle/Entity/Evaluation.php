<?php

namespace EvaluationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Evaluation
 *
 * @ORM\Table(name="evaluation")
 * @ORM\Entity(repositoryClass="EvaluationBundle\Repository\EvaluationRepository")
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
     * @ORM\Column(name="note", type="text", length=255,nullable=true)
     */
    private $note;
    /**
     *
     * @ORM\ManyToOne(targetEntity="FixBundle\Entity\Utilisateur")
     * @ORM\JoinColumn(name="userid",referencedColumnName="id")
     */

    private $professionnelle;
    /**
     * @return string
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * @param string $note
     */
    public function setNote($note)
    {
        $this->note = $note;
    }

    /**
     * @return mixed
     */
    public function getProfessionnelle()
    {
        return $this->professionnelle;
    }

    /**
     * @param mixed $professionnelle
     */
    public function setProfessionnelle($professionnelle)
    {
        $this->professionnelle = $professionnelle;
    }




    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}

