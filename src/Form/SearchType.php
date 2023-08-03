<?php

namespace App\Form;

use App\Entity\Search;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchType extends AbstractType{

    function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('text',TextType::class,[
            'label'=>false,
            'required'=>true,
            'attr'=>[
                'placeholder'=>'pomme, poire...',
                'class'=>'form-control me-2'
            ]

        ])
              ->add('recherche',SubmitType::class,[
                'attr'=>[
                    'type'=>'button',
                    'class'=>'btn btn-outline-success'
                ]
              ]);
    }

    //configure options for form class
    function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class'=>Search::class,
        ]);
    }
}

?>