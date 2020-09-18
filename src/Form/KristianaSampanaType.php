<?php

namespace App\Form;

use App\Entity\Sampana;
use App\Entity\SampanaKristiana;
use App\Entity\Toerana;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class KristianaSampanaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('sampana', EntityType::class, [
                'label' => false,
                'class' => Sampana::class,
                'choice_label' => 'anarana',
                'required' =>true
            ])
            ->add('toerana', EntityType::class, [
                'label' => false,
                'class' => Toerana::class,
                'choice_label' => 'anarana',
                'required' =>true
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => SampanaKristiana::class,
        ]);
    }
}
