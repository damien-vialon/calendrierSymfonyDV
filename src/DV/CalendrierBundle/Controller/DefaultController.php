<?php

namespace DV\CalendrierBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('DVCalendrierBundle:Default:index.html.twig', array('name' => $name));
    }
}
