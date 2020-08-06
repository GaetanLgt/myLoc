<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\LoginType;
use App\Entity\Category;
use App\Form\EditUserType;
use App\Form\CategoryEditType;
use App\Repository\UserRepository;
use App\Repository\CategoryRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

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
        /**
     * @Route("/categories/modifier/{id}", name="modifier_categories")
     */
    public function editCategory(Category $category, Request $request)
    {
        $form = $this->createForm(CategoryEditType::class, $category);
        $form->handleRequest($request);
        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository(Category::class)->findAll();

    if ($form->isSubmitted() && $form->isValid()) {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($category);
        $entityManager->flush();

        $this->addFlash('message', 'Categories modifiée avec succès');
        
    }
    
    return $this->render('admin/editCategory.html.twig', [
        'CategoryForm' => $form->createView(),
        'categories' => $categories,
    ]);
}
    /**
     * @Route("/categories", name="categories")
     */
    public function categoryList(CategoryRepository $category)
    {   
        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository(Category::class)->findAll();
        return $this->render('admin/category.html.twig', [
            'category' => $category->findAll(),
            'categories' => $categories,
        ]);
    }

    /**
     * @Route("/categories/add", name="category_add")
     */
    public function addCat( Request $request)
    {
        $category = new Category ;
        $form = $this->createForm(CategoryEditType::class,$category);
        $form->handleRequest($request);
        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository(Category::class)->findAll();

    if ($form->isSubmitted() && $form->isValid()) {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($category);
        $entityManager->flush();
        $this->addFlash('message', 'Categories ajoutée avec succès');

        
        
    }
    return $this->render('admin/addCategorie.html.twig', [
            'categories' => $categories,
            'CategoryForm' => $form->createView(),
        ]);
}
    /**
     * @Route("/utilisateurs/add", name="utilisateurs_add")
     */
    public function addUser( Request $request, UserPasswordEncoderInterface $encoder)
    {
        $utilisateur = new User ;
        $form = $this->createForm(LoginType::class,$utilisateur);
        $form->handleRequest($request);
        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository(Category::class)->findAll();

    if ($form->isSubmitted() && $form->isValid()) {
        $entityManager = $this->getDoctrine()->getManager();
        $hash = $encoder->encodePassword($utilisateur, $utilisateur->getPassword());
        $utilisateur->setPassword($hash);
        $utilisateur->setTotalPts(1000);
        $utilisateur->setRole("ROLE_USER");
        $entityManager->persist($utilisateur);
        $entityManager->flush();
        $this->addFlash('message', 'Utilisateur ajouté avec succès');

        
        
    }
    return $this->render('admin/addUser.html.twig', [
            'categories' => $categories,
            'userForm' => $form->createView(),
        ]);
}
}