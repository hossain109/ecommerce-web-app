<?php

namespace App\Form;

use App\Entity\Souscription;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SouscriptionType extends AbstractType{

    function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('text',EmailType::class,[
            'label'=>false,
            'required'=>true,
            'attr'=>[
                'class'=>'form-control me-2'
            ]

        ])
              ->add('envoyer',SubmitType::class,[
                'attr'=>[
                    'type'=>'button',
                    'class'=>'btn btn-outline-success'
                ]
              ]);
    }

    function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            "data_class"=>Souscription::class
        ]);
    }
}

?>