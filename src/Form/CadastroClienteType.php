<?php

namespace App\Form;

use App\Entity\Cliente;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;

class CadastroClienteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nome_cliente', TextType::class, ['label' => 'Usuário', 'constraints' => new Length(['min' => 3])])
            ->add('email', EmailType::class, ['label' => 'Email'])
            ->add('cpf', NumberType::class, ['label' => 'CPF', 'constraints' => new Length(['min' => 11, 'max' => 11])])
            ->add('telefone', NumberType::class, ['label' => 'Telefone', 'constraints' => new Length(['min' => 8])])
            ->add('senha', PasswordType::class, ['label' => 'Senha', 'constraints' => new Length(['min' => 6])])
            ->add('confirma', SubmitType::class, ['label' => 'Cadastrar'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Cliente::class,
        ]);
    }
}
