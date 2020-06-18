<?php

namespace App\Form;

use App\Entity\DataOak;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\Form\Extension\Core\Type\DateType;



class DataOakType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class,[
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('latitude', TextType::class,[
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('longitude', TextType::class,[
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('TimeStamp')

            ->add('Qualite_Air', TextType::class,[
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => DataOak::class,
        ]);
    }
}
