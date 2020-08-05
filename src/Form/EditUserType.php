<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class EditUserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname')
            ->add('lastname')
            ->add('totalPts')
            ->add('email', EmailType::class,[
                'required' => true,
                'attr' => ['class' =>'form-control'],
            ])
            ->add('role', ChoiceType::class, [
                'attr' => ['class' => 'multiple'],
                'choices' => [
                    'Utilisateur ' => 'ROLE_USER',
                    'Administrateur' => 'ROLE_ADMIN',
            ],
                'expanded' => false,
                'multiple' => true,
                'label' => 'Rôles',
                'choice_attr' => [
                    'class' => ''
                ],
            ])
            ->add('valider', SubmitType::class,[
                'attr' => ['class' => 'btn mb-3'],
            ])
        ;
        
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
