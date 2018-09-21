<?php

namespace App\Form;

use App\Entity\Contrat;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContratType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dateDebut', DateType::class, array(
                    'widget' => 'single_text',
                )
            )
            ->add('dateFin', DateType::class, array(
                    'widget' => 'single_text',
                )
            )
            ->add('dateSignature', DateType::class, array(
                    'widget' => 'single_text',
                )
            )
            ->add('prix', ChoiceType::class, array(
                    'choices'  => array(
                        '80 000' => '80000',
                        '82 500' => '82500',
                        '85 000' => '85000',
                        '87 500' => '87500',
                        '90 000' => '90000',
                        '92 500' => '92500',
                        '95 000' => '95000',
                        '97 500' => '97500',
                        '100 000' => '100000',
                    )
                )
            )
            ->add('materiel')
            ->add('type', ChoiceType::class, array(
                    'choices'  => array(
                        'Particulier' => 'PARTICULIER',
                        'Entreprise' => 'ENTREPRISE',
                    ),
                    'required' => true,
                    'expanded' => true,
                    'multiple' => false,
                    'attr' => array('class' => 'form-check-inline'),
                )
            )
            ->add('entreprise')
            ->add('particulier')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contrat::class,
        ]);
    }
}
