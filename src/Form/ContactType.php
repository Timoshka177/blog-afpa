<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstName', TextType::class, [
                'label' => 'Prénom',
                'attr' => array(
                    'placeholder' => 'Entrer votre prénom'
                )
            ])
            ->add('lastName', TextType::class, [
                'label' => 'Nom',
                'attr' => array(
                    'placeholder' => 'Entrer votre nom'
                )
            ])
            ->add('email', EmailType::class, [
                'label' => 'Email',
                'attr' => array(
                    'placeholder' => 'Entrer votre email'
                )
            ])
            ->add('message', TextareaType::class, [
                'label' => 'Votre message',
                'attr' => array(
                    'placeholder' => 'Entrer votre message ici'
                )
            ])
            ->add('object', ChoiceType::class, [
                'label' => 'Que nous vaut le plaisir?',
                'choices' => [
                    'Je souhaite vous contacter par choix 1' => 'Choix 1',
                    'Je souhaite vous contacter par choix 2' => 'Choix 2' ,
                    'Je souhaite vous contacter par choix 3' => 'Choix 3'
                ]
            ])
            ->add('phone', TextType::class, [
                'label' => 'Votre numéro de téléphone',
                'attr' => array(
                    'placeholder' => 'Entrer votre numéro de téléphone'
                )
            ])
            ->add('save', SubmitType::class, [
                'attr' => ['class' => 'save btn-primary'],
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
