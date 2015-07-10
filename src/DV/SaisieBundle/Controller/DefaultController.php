<?php

namespace DV\SaisieBundle\Controller;

use DV\SaisieBundle\Entity\Professeur;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $professeur= new Professeur();

        // Création du formulaire
        $form = $this->createFormBuilder($professeur)
            ->add('nom', 'text')
            ->add('prenom', 'text')
            ->add('Enregistrer le professeur', 'submit')
            ->getForm();

        $form->handleRequest($this->getRequest());

//        if ($form->isValid()) {
//            // fait quelque chose comme sauvegarder la tâche dans la bdd
//
//            return $this->redirect($this->generateUrl('/saisie/success'));
//        }

        return $this->render('DVSaisieBundle:Default:index.html.twig', array(
            'form' => $form->createView(),
        ));

    }

    public function enregistrerAction()
    {
        return "test ok";
    }
}
