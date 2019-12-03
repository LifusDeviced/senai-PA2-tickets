<?php

namespace App\Form;

use App\Entity\Evento;
use App\Entity\LocalEvento;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Expression;
use Symfony\Component\Validator\Constraints\GreaterThan;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\Unique;
use Doctrine\ORM\EntityRepository;

class CadastroEventoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nome_evento', TextType::class,
                ['label' => 'Nome do Evento', 'constraints' => new Length(['min' => 4])])
            ->add('descricao', TextareaType::class, ['label' => 'Descrição'])
            ->add('link_imagem',TextType::class, ['label' => 'Link da Imagem'])
            ->add('data', DateTimeType::class, ['label' => 'Data do Evento',
                'date_widget' => 'single_text',
                'time_widget' => 'choice',
                'constraints' =>
                    new GreaterThan([
                        'value' => date('Y-m-d'),
                        'message' => 'A data não pode ser menor que a atual']),
                ])
            ->add('valor', NumberType::class,
                ['label' => 'Valor', 'constraints' => new GreaterThan(['value' => 0, 'message' => 'O valor não pode ser negativo'])])
            ->add('id_local_evento', EntityType::class,[
                'class' => LocalEvento::class,
                'choice_label' => 'nome_local'
            ])
            ->add('confirma', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Evento::class,
        ]);
    }
}
