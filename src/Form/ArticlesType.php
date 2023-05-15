<?php

namespace App\Form;

use App\Entity\Articles;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArticlesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class)
            ->add('catchPhrase', TextType::class)
            ->add('date', DateType::class)
            ->add('author', TextType::class)
            ->add('description', TextType::class)
            ->add('posterFile', FileType::class, array(
                    'required'   => false,
                ))
            ->add('relatedSubjects', CollectionType::class, [
                'entry_type' => TextType::class,
                'allow_add' => true,
            ])
            ->add('chapo', TextType::class)
            ->add('legendMainPicture', TextType::class)
            ->add('authorWebsite', TextType::class)
            ->add('relatedCourse', NumberType::class)
            ->add('category')
            ->add('Modifier', SubmitType::class, [
                'attr' => ['class' => 'save btn-primary'],
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Articles::class,
        ]);
    }
}
