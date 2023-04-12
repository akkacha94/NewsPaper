<?php

namespace App\Form;

use App\Entity\Category;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class CategroyFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name',TextType::class, [
                'label' => "Nome de la catégori",
                'label_attr' => [
                    'class' => "text-light"
                ]
            ])
            ->add('alias', TextType::class, [
                'label' => "Nome de l'alais",
                'label_attr' => [
                    'class' => "text-white"
                ]
            ])
            ->add('submit', SubmitType::class,[
                'label' => "Ajouter",
                'validate' => false,
                'attr' => [
                    'class' => 'd-block mx-auto my-3 col-'
                ]
            ])

           
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Category::class,
        ]);
    }
}
