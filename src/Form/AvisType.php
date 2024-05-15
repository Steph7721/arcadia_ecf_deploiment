<?php

namespace App\Form;

use App\Entity\Avis;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AvisType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                'label' => 'Votre email',
                'attr' => [
                    'class' => 'form-control',
                ]
            ])
            ->add('pseudo', TextType::class , [
                'label' => 'Votre pseudo',
                'attr' => [
                    'class' => 'form-control',
                ]
            ])
            ->add('content', TextareaType::class , [
                'label' => 'Votre commentaire',
                'attr' => [
                    'class' => 'form-control',
                ]
            ])
            ->add('rgpd', CheckboxType::class, [
                'label' => 'J\'accepte que mes informations soient stockées dans la base de données d\'Arcadia pour la publicatioon de mon avis'
            ])
            ->add('envoyer', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-secondary'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Avis::class,
        ]);
    }
}

