<?php

namespace App\Form;

use App\Entity\Admin;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationAdminType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email',EmailType::class,[
                'label'=>"Email*",
                'row_attr' => ['class' => 'form-group mb-3'],
                'attr'=>[
                    'class'=>'form-control'
                ]
            ])
            ->add('roles',ChoiceType::class, [
                'multiple' => true,
                'required+' => true,
                'choices'  => [
                    'ROLE_USER' => 'ROLE_USER',
                    'ROLE_ADMIN' => 'ROLE_ADMIN',
                    'ROLE_SUPER_ADMIN' => 'ROLE_SUPER_ADMIN',
                ],
                'label'=>"Roles",
                'row_attr' => ['class'=>'from-group mb-3'],
                'attr'=>[
                    'class' =>'form-control'
                ]
                ])
            ->add('password',PasswordType::class,[
                'label' =>'Password',
                'row_attr'=>['class'=>'form-group mb-3'],
                'attr'=>[
                    'class'=>'form-control'
                ],
                'mapped' => false,
                //'attr' => ['autocomplete' => 'new-password'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Vueillez entrer nouveau mot de passe',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Mot de passe faut minimum {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
                ])
                ->add('portable',NumberType::class,[
                    'label'=>'N° portable*',
                    'row_attr' => ['class' => 'form-group mb-3'],
                    'attr'=>[
                        'class'=>'form-control'
                    ]
                ])
                ->add('adresse',TextType::class,[
                    'label'=>'Addresse*',
                    'row_attr' => ['class' => 'form-group mb-3'],
                    'attr'=>[
                        'class'=>'form-control'
                    ]
                ])
                ->add('submit', SubmitType::class,[
                    'attr'=>[
                        'type'=>'button',
                        'class'=>'btn btn-outline-success'
                    ]
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Admin::class,
        ]);
    }
}
