<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('email', EmailType:: Class,[ //cuando hayamos puesto hay que incluirlo en las dependencias
            'label'=>'email',
            'attr'=>[
                'placeholder'=>'correo electronico',
                'autocomplete'=>'off',
                'class'=> 'form-control',
                'requiered'=>true
            ]       
        ])  

        ->add('password', PasswordType:: Class,[ //cuando hayamos puesto hay que incluirlo en las dependencias
            'label'=>'password',
            'attr'=>[
                'placeholder'=>'contraseña',
                'autocomplete'=>'off',
                'class'=> 'form-control',
                'requiered'=>true
            ]       
        ])  

        ->add('submit', submitType:: Class,[ //cuando hayamos puesto hay que incluirlo en las dependencias
            'label'=>'Guardar'        
        ])


        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
