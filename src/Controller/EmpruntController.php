<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Emprunt;
use App\Form\EmpruntType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EmpruntController extends AbstractController
{
    /**
     * @Route("/emprunt/{id}", name="emprunt")
     */
    public function index(Emprunt $affaires ,Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository(Category::class)->findAll();

        $form = $this->createForm(EmpruntType::class, $affaires);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($affaires);
            $entityManager->flush();
        }
      
        return $this->render('emprunt/index.html.twig', [
            'Form' => $form->createView(),
            'categories' => $categories,
        ]);
    }
}