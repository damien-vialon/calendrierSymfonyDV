<?php

namespace DV\SaisieBundle\Controller;

use DV\SaisieBundle\Entity\Professeur;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProfesseurController extends Controller
{
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

        return $this->render('DVSaisieBundle:Professeur:add.html.twig', array(
                'form' => $form->createView(),
        ));

    }

    public function enregistrerAction()
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

        return $this->render('DVSaisieBundle:Professeur:addOk.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
