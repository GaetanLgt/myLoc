<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Emprunt;
use App\Entity\Affaires;
use App\Entity\Category;
use App\Form\EmpruntType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EmpruntController extends AbstractController
{
    /**
     * @Route("/emprunt/{id}", name="emprunt")
     */
    public function modifEmprunt(Emprunt $emprunt ,Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository(Category::class)->findAll();
        $form = $this->createForm(EmpruntType::class, $emprunt);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($emprunt);
            $entityManager->flush();
        }
      
        return $this->render('emprunt/index.html.twig', [
            'Form' => $form->createView(),
            'categories' => $categories,
        ]);
    }
    /**
     * @Route("/emprunt/ajout/{id}/{user}", name="emprunt")
     */
    public function AddEmprunt(Affaires $affaires, User $user ,Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository(Category::class)->findAll();
        $emprunt1 = $em->getRepository(Emprunt::class)->findBy(['affaire'=> $affaires], ['dateDebut' => 'ASC'], 6);

        $emprunt =new Emprunt;
        $emprunt = $emprunt->setAffaire($affaires) ;
        $emprunt = $emprunt->setEmprunteur($user);
        $form = $this->createForm(EmpruntType::class, $emprunt);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $total = $user->getTotalPts();
            $pts = $affaires->getNbPts();
            $origin = $emprunt->getDateDebut();
            $target = $emprunt->getDateFin();
            $interval = $origin->diff($target);
            $interval = $interval->format('%a');
            $resultat= ($pts*$interval);
            $user->setTotalPts($total - $resultat);
            $proprio = $affaires->getProprietaire();
            $proprioPts = $proprio->getTotalPts();
            $proprio->setTotalPts($proprioPts + $resultat);
            $this->addFlash('message', "réservation faite $resultat points déduits");
            $entityManager->persist($proprio);
            $entityManager->persist($emprunt);
            $entityManager->persist($user);
            $entityManager->flush();
        }
      
        return $this->render('emprunt/ajout.html.twig', [
            'emprunt' => $emprunt1,
            'Form' => $form->createView(),
            'categories' => $categories,
        ]);
    }
}