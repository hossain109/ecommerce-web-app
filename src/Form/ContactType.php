<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class,[
                'label'=>'Nom*',
                'row_attr' => ['class' => 'form-group mb-3'],
                'attr'=>[
                    'class'=>'form-control'
                ]
            ])
            ->add('email',EmailType::class,[
                'label'=>'Email*',
                'row_attr' => ['class' => 'form-group mb-3'],
                'attr'=>[
                    'class'=>'form-control'
                ]
            ])
            ->add('portable',IntegerType::class,[
                'label'=>'Telephone Portable*',
                'row_attr' => ['class' => 'form-group mb-3'],
                'attr'=>[
                    'class'=>'form-control'
                ]
            ])
            ->add('message',TextareaType::class,[
                'label'=>'Votre Message*',
                'row_attr' => ['class' => 'form-group mb-3'],
                'attr'=>[
                    'class'=>'form-control'
                ]
            ])
            ->add('createdAt',DateTimeType::class)
            
            ->add('contact',SubmitType::class,[
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
            // Configure your form options here
            'data_class'=>Contact::class
        ]);
    }
}
