<?php

namespace DV\SaisieBundle\Controller;

use DV\SaisieBundle\Entity\Matiere;
use DV\SaisieBundle\Entity\Professeur;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PlanningController extends Controller
{
    public function indexAction()
    {
        // Récupération de la liste des professeurs
        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('DVSaisieBundle:Professeur');

        $listProfesseurs = $repository->findAll();

        return $this->render('DVSaisieBundle:Planning:index.html.twig', array(
            'listProfesseurs' => $listProfesseurs
        ));
    }

    public function addAction()
    {
        $em = $this->getDoctrine()->getManager();
        $professeur = new Professeur();
        $matiere = new Matiere();
        $cours = null;

        // Création du formulaire
        $form = $this->createFormBuilder($cours)
            ->add('professeur', 'entity', array(
                'empty_value' => 'Choissez un professeur',
                'label' => 'Professeur',
                'class' => 'DV\SaisieBundle\Entity\Professeur',
                'choice_label' => 'professeur'
            ))
            ->add('libelle', 'entity', array(
                'empty_value' => 'Choissez une matière',
                'label' => 'Matière',
                'class' => 'DV\SaisieBundle\Entity\Matiere',
                'choice_label' => 'libelle'
            ))
            ->add('Enregistrer le professeur', 'submit')
            ->getForm();

        $form->handleRequest($this->getRequest());


        //TODO faire un insert dans la table "matiere_professeur" en fonction du professeur et de la matière choisie

        
//        if ($form->isValid()) {
//            // enregistrement BDD
//            $professeur = $form->getData();
//            $em->persist($professeur);
//            $em->flush();
//
//            return $this->redirect($this->generateUrl('dv_planning_enregistrer'));
//        }

        return $this->render('DVSaisieBundle:Planning:add.html.twig', array(
            'form' => $form->createView()
        ));

    }

    public function enregistrerAction()
    {
        $em = $this->getDoctrine()->getManager();
        $professeur = new Professeur();
        $matiere = new Matiere();
        $cours = null;

        // Création du formulaire
        $form = $this->createFormBuilder($cours)
            ->add('professeur', 'entity', array(
                'empty_value' => 'Choissez un professeur',
                'label' => 'Professeur',
                'class' => 'DV\SaisieBundle\Entity\Professeur',
                'choice_label' => 'professeur'
            ))
            ->add('libelle', 'entity', array(
                'empty_value' => 'Choissez une matière',
                'label' => 'Matière',
                'class' => 'DV\SaisieBundle\Entity\Matiere',
                'choice_label' => 'libelle'
            ))
            ->add('Enregistrer le professeur', 'submit')
            ->getForm();

        $form->handleRequest($this->getRequest());

//        if ($form->isValid()) {
//            // enregistrement BDD
//            $professeur = $form->getData();
//            $em->persist($professeur);
//            $em->flush();
//
//            return $this->redirect($this->generateUrl('dv_planning_enregistrer'));
//        }

        return $this->render('DVSaisieBundle:Planning:addOk.html.twig', array(
            'form' => $form->createView()
        ));

    }

}
