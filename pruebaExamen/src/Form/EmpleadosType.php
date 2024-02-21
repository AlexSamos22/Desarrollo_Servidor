<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EmpleadosType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nombre', textType::class,[
                'label' => 'nombre',
                'attr' => [
                    'placeholder' => 'nombre',
                    'autocomplete' => 'off',
                    'class' => 'form-control',
                    'require' => true
                ]
            ])

            ->add('apellido', textType::class,[
                'label' => 'apellido',
                'attr' => [
                    'placeholder' => 'apellido',
                    'autocomplete' => 'off',
                    'class' => 'form-control',
                    'require' => true
                ]
            ])

            ->add('salario', IntegerType::class,[
                'label' => 'salario',
                'attr' => [
                    'placeholder' => 'salario',
                    'autocomplete' => 'off',
                    'class' => 'form-control',
                    'require' => true
                ]
            ])

            ->add('submit', submitType::class,[
                'label'=>'Guardar'
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
