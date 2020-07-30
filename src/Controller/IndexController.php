<?php

namespace App\Controller;

use App\Entity\Affaires;
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

        $produitsRetour = $em->getRepository(Affaires::class)->findBy([], ['id' => 'DESC'], 5 );

        return $this->render('index/index.html.twig', [
            'produitsRetour' => $produitsRetour,
        ]);
    }
}

