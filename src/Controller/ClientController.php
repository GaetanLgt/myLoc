<?php

namespace App\Controller;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ClientController extends AbstractController
{
    /**
     * @Route("/client", name="client")
     */
    public function index()
    {
        $em = $this->getDoctrine()->getManager();

        $clientUser = $em->getRepository(User::class)->findAll();

        return $this->render('client/index.html.twig', [
            'clientUser' => $clientUser,
        ]);
    }
}