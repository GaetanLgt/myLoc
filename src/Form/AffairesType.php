<?php

namespace App\Form;

use App\Entity\Affaires;
use App\Entity\Category;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class AffairesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('description')
            ->add('nbPts')
            ->add('proprietaire')
            ->add('categorie', EntityType::class, [
                    'class' => Category::class,
                    'choice_label' =>'name'
            ])
            ->add('imageFile' , (VichImageType::class))
            ->add('enregister', (SubmitType::class))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Affaires::class,
        ]);
    }
}