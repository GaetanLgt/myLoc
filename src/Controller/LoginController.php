<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\LoginType;
use App\Entity\Category;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class LoginController extends AbstractController
{
    /**
     * @Route("/registration", name="registration")
     */
    public function newUSer(Request $request, UserPasswordEncoderInterface $encoder)
    {
        $user = new User;

        $form = $this->createForm(LoginType::class, $user);
        $form->handleRequest($request);

        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository(Category::class)->findAll();

        if($form->isSubmitted() && $form->isValid()){
            $hash = $encoder->encodePassword($user, $user->getPassword());

            $user->setPassword($hash);

            $newUser = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($newUser);
            $em->flush();
        }

        return $this->render('login/index.html.twig', [
            'form' => $form->createView(),
            'categories' => $categories,
        ]);
    }
    
    /** 
     * @Route("/login", name="login")
     */
    public function login()
    {
        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository(Category::class)->findAll();
        
        return $this->render('login/login.html.twig',[
            'categories' => $categories,  
        ]);
    }

    /**
     * @Route("/logout", name="logout")
     */
    public function logout()
    {
        
    }
}