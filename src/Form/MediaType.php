<?php

namespace App\Form;

use App\Entity\Media;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MediaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('path',FileType::class,
                [
                    'label' => 'Image de Produit*',
                    'row_attr' => ['class' => 'form-group mb-3'],
                    'attr'=>[
                    'class'=>'form-control'
                    ],
    
                    // unmapped means that this field is not associated to any entity property
                    'mapped' => false,
    
                    // make it optional so you don't have to re-upload the PDF file
                    // every time you edit the Product details
                    'required' => false,
    
                    // unmapped fields can't define their validation using annotations
                    // in the associated entity, so you can use the PHP constraint classes
                    'constraints' => [
                        new File([
                            'maxSize' => '1024k',
                            'mimeTypes' => [
                                'image/jpg',
                                'image/jpeg',
                                'image/png',
                            ],
                            'mimeTypesMessage' => 'Telecharger une Image JPG/PNG',
                        ])
                    ],
                ])
            ->add('alt',TextType::class,[
                'label'=>'Nom de Image*',
                'row_attr' => ['class' => 'form-group mb-3'],
                'attr'=>[
                    'class'=>'form-control'
                ]
            ])
            ->add('submit',SubmitType::class,[
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
            'data_class' => Media::class,
        ]);
    }
}
