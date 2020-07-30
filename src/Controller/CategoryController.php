<?php

namespace App\Controller;

use App\Entity\Category;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CategoryController extends AbstractController
{
    /**
     * @Route("/category/{id}", name="category")
     */
    public function index($id)
    {
        $em = $this->getDoctrine()->getManager();

        $categorie = $em->getRepository(Category::class)->find($id);
        $produitsCat = $categorie->getAffaires();

        
        return $this->render('category/index.html.twig', [
            'categorie' => $categorie,
            'produitsCat'=> $produitsCat,
        ]);
    }
}
