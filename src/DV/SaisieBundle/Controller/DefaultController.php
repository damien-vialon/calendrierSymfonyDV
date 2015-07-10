<?php

namespace DV\SaisieBundle\Controller;

use DV\SaisieBundle\Entity\Professeur;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('DVSaisieBundle:Default:index.html.twig');
    }

    public function addAction()
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

        if ($form->isValid()) {
            // enregistrement BDD
            $professeur = $form->getData();
            $em->persist($professeur);
            $em->flush();

            return $this->redirect($this->generateUrl('dv_saisie_enregistrer'));
        }

        return $this->render('DVSaisieBundle:Default:add.html.twig', array(
            'form' => $form->createView(),
        ));

    }

    public function enregistrerAction()
    {
        $professeur= new Professeur();

        // Création du formulaire
        $form = $this->createFormBuilder($professeur)
            ->add('nom', 'text')
            ->add('prenom', 'text')
            ->add('Enregistrer le professeur', 'submit')
            ->getForm();

        $form->handleRequest($this->getRequest());

        return $this->render('DVSaisieBundle:Default:addOk.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
