<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\Produit;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class ProduitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('description')
            ->add('prixProduit')
            ->add('quantiteProduit')
            //->add('imageProduit')
            ->add('imageProduit', FileType::class, [
                'label' => 'image only',
                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '1024k',
<<<<<<< HEAD
                        //'mimeTypes' => [
                        //    'application/jpeg',
                        //    'application/jpg',
                        //],
=======
                        // 'mimeTypes' => [
                        //     'application/jpeg',
                        //     'application/jpg',
                        // ],
>>>>>>> 3602cc13980ff58e460c2009f98751954ed07c57
                        'mimeTypesMessage' => 'Please upload a valid image',
                    ])
                ],
            ])
            ->add('dateExpiration')
            ->add('category', EntityType::class, [
                'class' => Category::class,
                'choice_label' => 'nomCategory',
                'multiple' => false,
                'expanded' => false,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Produit::class,
        ]);
    }
}
