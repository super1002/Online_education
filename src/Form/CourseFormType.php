<?php

namespace App\Form;

use App\Entity\Course;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CourseFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name',  TextType::class, [
                'label' => 'Название курса',
                'attr' => ['class' => 'form-control']
            ])
            ->add('description',  TextareaType::class, [
                'required'   => false,
                'label' => 'Описание курса',
                'attr' => ['class' => 'form-control']
            ])
            ->add('cost', MoneyType::class, [
                'currency' => '',
                'label' => 'Цена ₴',
                'attr' => ['class' => 'form-control']
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Course::class,
        ]);
    }
}

