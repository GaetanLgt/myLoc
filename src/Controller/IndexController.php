<?php

namespace App\Controller;

use App\Entity\Affaires;
use App\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index()
    {
        $em = $this->getDoctrine()->getManager();

        $produitsRetour = $em->getRepository(Affaires::class)->findBy([], ['id' => 'DESC'], 6);
        $categories = $em->getRepository(Category::class)->findAll();

        return $this->render('index/index.html.twig', [
            'produitsRetour' => $produitsRetour,
            'categories' => $categories,
        ]);
    }
}

