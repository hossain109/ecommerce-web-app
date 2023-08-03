<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email',EmailType::class,[
                'label'=>'Email*',
                'row_attr' => ['class' => 'form-group mb-3'],
                'attr'=>[
                    'class'=>'form-control'
                ]
            ])
            ->add('aggrement', CheckboxType::class, [
                'label'=>'Accord les conditions',
                'row_attr' => ['class' => 'form-group mb-3'],
                'mapped' => true,
                'constraints' => [
                    new IsTrue([
                        'message' => 'Vous devez accepter les conditons',
                    ]),
                ],
            ])
            ->add('plainPassword', PasswordType::class, [
                'label'=>'Mot de passe*',
                'row_attr' => ['class' => 'form-group mb-3'],
                'attr'=>[
                    'class'=>'form-control'
                ],
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
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
            ->add('nom', TextType::class,[
                'label'=>'Nom*',
                'row_attr' => ['class' => 'form-group mb-3'],
                'attr'=>[
                    'class'=>'form-control'
                ]
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
            ->add('inscriptipn',SubmitType::class,[
                'attr'=>[
                    'type'=>'button',
                    'class'=>'btn btn-outline-success'
                ]
              ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
