<?php

namespace App\Form;

use App\Entity\Patient;
use App\Entity\RendezVous;
use App\Entity\EtatRv;
use App\Entity\TypeRv;
use App\Entity\PrestationEnum;
use App\Entity\ConsultationEnum;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\EnumType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DemandeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('dateRv', DateTimeType::class, [
                'widget' => 'single_text',
                'required' => true,
                'attr' => [
                    'class' => 'form-control'
                ]
            ])

            ->add('type', EnumType::class, [
                'class' => TypeRv::class,
                'placeholder' => 'Type de rendez-vous',
                'required' => true,
                'attr' => [
                    'class' => 'form-control'
                ]
            ])

            ->add('prestation', EnumType::class, [
                'class' => PrestationEnum::class,
                'placeholder' => 'Prestation',
                'required' => false,
                'attr' => [
                    'class' => 'form-control'
                ]
            ])

            ->add('consultation', EnumType::class, [
                'class' => ConsultationEnum::class,
                'placeholder' => 'Consultation',
                'required' => false,
                'attr' => [
                    'class' => 'form-control'
                ]
                ])

                ->add('patient', EntityType::class, [
                'class' => Patient::class,
                'choice_label' => 'nom', 
                'placeholder' => 'Patient',
                'required' => true,
                'attr' => [
                    'class' => 'form-control'
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => RendezVous::class,
            'attr' => [
                'data-turbo' => 'false'
            ]
        ]);
    }
}
