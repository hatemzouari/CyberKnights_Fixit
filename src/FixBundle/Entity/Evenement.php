<?php

namespace FixBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Evenement
 *
 * @ORM\Table(name="evenement")
 * @ORM\Entity(repositoryClass="FixBundle\Repository\EvennementRepository")
 */
class Evenement

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
     * @ORM\Column(type="string")
     */
    private $titre;
    /**
     * @ORM\Column(type="string")
     */
    private $decreption;
    /**
     * @ORM\Column(type="datetime")
     */
    private $date;
    /**
     * @ORM\Column(type="string")
     */
    private $lieux;
    /**
     * @ORM\Column(type="integer")
     */
    private $nbplace;
    /**
     * @ORM\Column(type="float")
     */
    private $prix;


    /**
     * @return mixed
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * @param mixed $prix
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;
    }

    /**
     * @return mixed
     */

    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * @param mixed $titre
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
    }

    /**
     * @return mixed
     */
    public function getDecreption()
    {
        return $this->decreption;
    }

    /**
     * @param mixed $decreption
     */
    public function setDecreption($decreption)
    {
        $this->decreption = $decreption;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getLieux()
    {
        return $this->lieux;
    }

    /**
     * @param mixed $lieux
     */
    public function setLieux($lieux)
    {
        $this->lieux = $lieux;
    }

    /**
     * @return mixed
     */
    public function getNbplace()
    {
        return $this->nbplace;
    }

    /**
     * @param mixed $nbplace
     */
    public function setNbplace($nbplace)
    {
        $this->nbplace = $nbplace;
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

