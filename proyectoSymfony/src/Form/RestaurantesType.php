<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RestaurantesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('correo', EmailType::class,[
                'label' => 'Correo electronico',
                'attr' => [
                    'placeholder' => 'correo electronico',
                    'autocomplete' => 'off',
                    'class' => 'form-control',
                    'required' => true
                ]
            ])
            
            ->add('clave', PasswordType::class,[
                'label' => 'Clave',
                'attr' => [
                    'placeholder' => 'clave',
                    'autocomplete' => 'off',
                    'class' => 'form-control',
                    'required' => true
                ]
            ])

            ->add('pais', TextType::class,[
                'label' => 'Pais',
                'attr' => [
                    'placeholder' => 'pais',
                    'autocomplete' => 'off',
                    'class' => 'form-control',
                    'required' => true
                ]
            ])

            ->add('cp', NumberType::class,[
                'label' => 'CP',
                'attr' => [
                    'placeholder' => 'cp',
                    'autocomplete' => 'off',
                    'class' => 'form-control',
                    'required' => true
                ]
            ])

            ->add('ciudad', TextType::class,[
                'label' => 'Ciudad',
                'attr' => [
                    'placeholder' => 'ciudad',
                    'autocomplete' => 'off',
                    'class' => 'form-control',
                    'required' => true
                ]
            ])

            ->add('direccion', TextType::class,[
                'label' => 'Direccion',
                'attr' => [
                    'placeholder' => 'direccion',
                    'autocomplete' => 'off',
                    'class' => 'form-control',
                    'required' => true
                ]
            ])

            ->add('submit', SubmitType::class, [
                'label' => 'Guardar'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
