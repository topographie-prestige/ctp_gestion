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
                        '75 000' => '75 000',
                        '77 500' => '77 500',
                        '85 000' => '85 000',
                        '87 500' => '87 500',
                        '95 000' => '95 000',
                        '97 500' => '97 500',
                        '100 000' => '100 000',
                    )
                )
            )
            ->add('entreprise')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contrat::class,
        ]);
    }
}
