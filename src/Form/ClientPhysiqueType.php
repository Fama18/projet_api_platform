<?php

namespace App\Form;

use App\Entity\ClientMoral;
use App\Entity\ClientPhysique;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ClientPhysiqueType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numCni', TextType::class,
            [
                "attr" => ["class" => "form-control"]
            ])
            ->add('nom', TextType::class,
            [
                "attr" => ["class" => "form-control"]
            ])
            ->add('prenom', TextType::class,
            [
                "attr" => ["class" => "form-control"]
            ])
            ->add('civilite', TextType::class,
            [
                "attr" => ["class" => "form-control"]
            ])
            ->add('adresse', TextType::class,
            [
                "attr" => ["class" => "form-control"]
            ])
            ->add('email', TextType::class,
            [
                "attr" => ["class" => "form-control"]
            ])
            ->add('telephone', TextType::class,
            [
                "attr" => ["class" => "form-control"]
            ])
            ->add('datenaissance', TextType::class,
            [
                "attr" => ["class" => "form-control"]
            ])
            ->add('clientmoral', EntityType::class,
            [
                "class" => ClientMoral::class,
                "choice_label" => "nomentreprise",
                "placeholder" => "--Selectionner l'entreprise--",
                "required" => false,
                "attr" => ["class" => "form-control"]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ClientPhysique::class,
        ]);
    }
}
