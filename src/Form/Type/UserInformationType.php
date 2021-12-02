<?php

namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;

class UserInformationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname', TextType::class,
                [
                    'required' => false,
                    'label' => 'Prénom :',
                ]
            )
            ->add('lastname', TextType::class,
                [
                    'required' => false,
                    'label' => 'Nom :',
                ]
            )
            ->add('email', EmailType::class,  
                ['label' => 'Email :']
            )
            ->add('Enregistrer', SubmitType::class)
        ;
    }
}
