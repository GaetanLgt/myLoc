<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Category;
use App\Form\EditUserType;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/admin", name="admin")
 */
class AdminController extends AbstractController
{
    /**
     * @Route("/", name="accueil")
     */
    public function index()
    {
        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository(Category::class)->findAll();
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
            'categories' => $categories,
        ]);
    }
/**
 * @Route("/utilisateurs/modifier/{id}", name="modifier_utilisateur")
 */
public function editUser(User $user, Request $request)
{
    $form = $this->createForm(EditUserType::class, $user);
    $form->handleRequest($request);
    $em = $this->getDoctrine()->getManager();
    $categories = $em->getRepository(Category::class)->findAll();

    if ($form->isSubmitted() && $form->isValid()) {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($user);
        $entityManager->flush();

        $this->addFlash('message', 'Utilisateur modifié avec succès');
        return $this->redirectToRoute('index');
    }
    
    return $this->render('admin/edituser.html.twig', [
        'userForm' => $form->createView(),
        'categories' => $categories,
    ]);
}


    /**
     * @Route("/utilisateurs", name="utilisateurs")
     */
    public function usersList(UserRepository $users)
    {   
        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository(Category::class)->findAll();
        return $this->render('admin/users.html.twig', [
            'users' => $users->findAll(),
            'categories' => $categories,
        ]);
    }

}

