<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ClientController extends AbstractController
{
    /**
     * @Route("/client/{id}", name="client")
     */
    public function index($id)
    {
        $em = $this->getDoctrine()->getManager();

        $clientUser = $em->getRepository(User::class)->find($id);
        $produitsClient = $clientUser->getAffaires();
        $empruntsClient = $clientUser->getEmprunts();

        return $this->render('client/index.html.twig', [
            'clientUser' => $clientUser,
            'produitsClient' => $produitsClient,
        ]);
    }
}