<?php

namespace DV\SaisieBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use DV\SaisieBundle\Entity\Matiere;

class LoadMatiere implements FixtureInterface
{
  // Dans l'argument de la m�thode load, l'objet $manager est l'EntityManager
  public function load(ObjectManager $manager)
  {
    // Liste des noms de cat�gorie � ajouter
    $names = array(
      'Maths',
      'Java',
      'PHP',
      'Anglais'
    );

    foreach ($names as $name) {
      // On cr�e la cat�gorie
      $matiere = new Matiere();
      $matiere->setLibelle($name);

      // On la persiste
      $manager->persist($matiere);
    }

    // On d�clenche l'enregistrement de toutes les cat�gories
    $manager->flush();
  }
}