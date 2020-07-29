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

        $produitsRetour = $em->getRepository(Affaires::class)->findAll();

        return $this->render('base.html.twig', [
            'produitsRetour' => $produitsRetour,
        ]);
    }
}
