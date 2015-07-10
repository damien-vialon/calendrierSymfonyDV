<?php

namespace DV\SaisieBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PlanningController extends Controller
{
    public function indexAction()
    {
        return $this->render('DVSaisieBundle:Planning:index.html.twig');
    }
}
