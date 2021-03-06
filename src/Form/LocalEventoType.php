<?php

namespace App\Form;

use App\Entity\LocalEvento;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\GreaterThan;
use Symfony\Component\Validator\Constraints\Length;

class LocalEventoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nome_local', TextType::class, ['label' => 'Nome do Local', 'constraints' => new Length(['min' => 4])])
            ->add('capacidade', IntegerType::class,
                ['label' => 'Capacidade',  'constraints' => new GreaterThan(['value' => 0, 'message' => 'O valor não pode ser negativo'])])
            ->add('confirma', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => LocalEvento::class,
        ]);
    }
}
