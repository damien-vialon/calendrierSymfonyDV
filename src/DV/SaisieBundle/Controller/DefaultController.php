<?php

namespace DV\SaisieBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('DVSaisieBundle:Default:index.html.twig');
    }
}
