<?php

namespace App\Form;

use App\Entity\Film;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FilmType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre', TextType::class, [
                'label' => 'Le titre du film',
                'empty_data' => "", 
            ])
            ->add('affiche', TextType::class, [
                'label' => 'L\'adresse de l\'image',
                'empty_data' => "", 
                
            ])
            ->add('recompense', TextType::class, [
                'label' => 'Les récompenses que le film a obtenu',
                'empty_data' => "",
            ])
            ->add('annee', DateType::class, [
                'label' => 'Date de sortie',
                'format' => 'dd MM yyyy',
                'data' => new \DateTime('now', new \DateTimeZone('Europe/Paris'))
            ])
            ->add('synopsis', TextType::class, [
                'label' => 'Dites nous en plus sur le synopsis',
                'empty_data' => "",
        
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Film::class,
            'attr' => [
                'novalidate' => 'novalidate'
            ]
        ]);
    }
}
