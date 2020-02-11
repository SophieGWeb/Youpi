<?php

namespace App\Form;

use App\Entity\Age;
use App\Entity\Place;
use App\Entity\Planning;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class PlaceFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dateDebut')
            ->add('dateFin')
            
            ->add('age', EntityType::class, [
                // looks for choices from this entity
                'class' => Age::class,
            
                // uses the User.username property as the visible option string
                'choice_label' => 'tranche',
            
                // used to render a select box, check boxes or radios
                // 'multiple' => true,
                 'expanded' => true,
            
            ])
        
            ->add('save', SubmitType::class);
            
            
    
            
            
        
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Place::class,
        ]);
    }
}
