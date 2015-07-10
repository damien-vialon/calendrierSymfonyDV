<?php

namespace DV\SaisieBundle\Controller;

use DV\SaisieBundle\Entity\Professeur;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PlanningController extends Controller
{
    public function indexAction()
    {
        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('DVSaisieBundle:Professeur');

        $listProfesseurs = $repository->findAll();

        return $this->render('DVSaisieBundle:Planning:index.html.twig', array('listProfesseurs' => $listProfesseurs));

    }
}
