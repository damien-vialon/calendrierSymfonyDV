<?php

namespace DV\SaisieBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Matiere
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Matiere
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=50)
     */
    private $libelle;

	/**
	* @ORM\ManyToMany(targetEntity="DV\SaisieBundle\Entity\Professeur", cascade={"persist"})
	*/
	private $professeur;

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
     * Set libelle
     *
     * @param string $libelle
     * @return Matiere
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string 
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * @return mixed
     */
    public function getProfesseur()
    {
        return $this->professeur;
    }

    /**
     * @param mixed $professeur
     */
    public function setProfesseur($professeur)
    {
        $this->professeur = $professeur;
    }
}
