<?php

namespace App\Controller;

use App\Entity\Affaires;
use App\Entity\Category;
use App\Entity\Emprunt;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProduitController extends AbstractController
{
    /**
     * @Route("/produit/{id}", name="produit")
     */
    public function index($id)
    {
        $em = $this->getDoctrine()->getManager();

        $produit = $em->getRepository(Affaires::class)->find($id);
        $categories = $em->getRepository(Category::class)->findAll();
        $emprunt = $em->getRepository(Emprunt::class)->findBy(['affaire'=> $id], ['dateDebut' => 'DESC'], 6);

        return $this->render('produit/index.html.twig', [
            'emprunt' => $emprunt,
            'produit' => $produit,
            'categories' => $categories,
        ]);
    }
}
