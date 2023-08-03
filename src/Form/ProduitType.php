<?php

namespace App\Form;

use App\Entity\Categories;
use App\Entity\Media;
use App\Entity\Produits;
use App\Entity\Souscategorie;
use App\Entity\Tva;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProduitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom',TextType::class,[
                'label'=>'Nom*',
                'row_attr' => ['class' => 'form-group mb-3'],
                'attr'=>[
                    'class'=>'form-control'
                ]
            ])
            ->add('description',TextType::class,[
                'label'=>'Description*',
                'row_attr' => ['class' => 'form-group mb-3'],
                'attr'=>[
                    'class'=>'form-control'
                ]
            ])
            ->add('prix',NumberType::class,[
                'label'=>'Prix*',
                'row_attr' => ['class' => 'form-group mb-3'],
                'attr'=>[
                    'class'=>'form-control'
                ]
            ])
            ->add('disponible',ChoiceType::class,[
                'label'=>'Disponibilté*',
                'row_attr' => ['class' => 'form-group mb-3'],
                'attr'=>[
                    'class'=>'form-control'
                ],
                'choices'  => [
                    'Oui' => true,
                    'Non' => false,
                ]
            ])
            ->add('categorie',EntityType::class,[
                'class'=>Categories::class,
                'label'=>'Categorie*',
                'row_attr' => ['class' => 'form-group mb-3'],
                'attr'=>[
                    'class'=>'form-control'
                ]
            ])
            ->add('image',EntityType::class,[
                'class'=>Media::class,
                'label'=>'Produit Image*',
                'row_attr' => ['class' => 'form-group mb-3'],
                'attr'=>[
                    'class'=>'form-control'
                ]
            ])
            ->add('tva',EntityType::class,[
                'class'=>Tva::class,
                'label'=>'Tva*',
                'row_attr' => ['class' => 'form-group mb-3'],
                'attr'=>[
                    'class'=>'form-control'
                ]
            ])
            ->add('souscategorie',EntityType::class,[
                'class'=>Souscategorie::class,
                'label'=>'Sous Categorie*',
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
            'data_class' => Produits::class,
        ]);
    }
}
