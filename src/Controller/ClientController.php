<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Emprunt;
use App\Entity\Affaires;
use App\Entity\Category;
use App\Form\AffairesType;
use App\Repository\AffairesRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class ClientController extends AbstractController
{
    /**
     * @Route("/client/{id}", name="client")
     */
    public function index($id,Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        
        $categories = $em->getRepository(Category::class)->findAll();

        $clientUser = $em->getRepository(User::class)->find($id);
        $produitsClient = $clientUser->getAffaires();
        $objets = $em->getRepository(Affaires::class)->findBy(['proprietaire'=> $id]);
        $emprunts = $em->getRepository(Emprunt::class)->findBy(['affaire' => $objets]);
        
        $form = $this->createForm(AffairesType::class);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            

            $newAffaire = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($newAffaire);
            $em->flush();
        }

        return $this->render('client/index.html.twig', [
            'clientUser' => $clientUser,
            'produitsClient' => $produitsClient,
            'categories' => $categories,
            'emprunts' => $emprunts,
            'form' => $form->createView(),
        ]);
    }

    
}