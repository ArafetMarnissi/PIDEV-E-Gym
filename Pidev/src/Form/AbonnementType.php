<?php

namespace App\Form;

use App\Entity\Abonnement;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class AbonnementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomAbonnement', ChoiceType::class, [
                'label' => 'Nom de l\'abonnement ',
                'choices' => [
                    'Basic' => 'Basic',
                    'Pro' => 'Pro',
                    'Premium' => 'Premium',
                ],
                'expanded' => true,
                'multiple' => false,

            ])
            ->add('prixAbonnement')
            ->add('dureeAbonnement', ChoiceType::class, [
                'label' => 'Durée de l\'abonnement ',
                'choices' => [
                    'Mensuel' => 'Mensuel',
                    'Annuel' => 'Annuel',
                ],
                'expanded' => true,
                'multiple' => false,

            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Abonnement::class,
        ]);
    }
}
