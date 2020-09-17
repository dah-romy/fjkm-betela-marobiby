<?php

namespace App\Form;

use App\Entity\Kristiana;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class KristianaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('anarana',TextType::class,[
                'label' => false,
                'required' => true
            ])
            ->add('fanampiny',TextType::class,[
                'label' => false,
                'required' => true
            ])
            ->add('finday',TextType::class,[
                'label' => false,
                'required' => false
            ])
            ->add('mailaka',EmailType::class,[
                'label' => false,
                'required' => false
            ])
            ->add('asa',TextType::class,[
                'label' => false,
                'required' => false
            ])
            ->add('adiresy',TextareaType::class,[
                'label' => false,
                'required' => false
            ])
            ->add('sokajy',ChoiceType::class,[
                'label' => false,
                'required' => true,
                'choices'  => [
                    'Lahy' => "L",
                    'Vavy' => "V",
                ],
            ])
            ->add('mpandray',CheckboxType::class,[
                'label' => false,
                'required' => false
            ])
            ->add('maty',CheckboxType::class,[
                'label' => false,
                'required' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Kristiana::class,
        ]);
    }
}
