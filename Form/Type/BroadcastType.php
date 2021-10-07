<?php

namespace MauticPlugin\MoceanApiBroadcastBundle\Form\Type;

use Mautic\CoreBundle\Form\EventListener\CleanFormSubscriber;
use Mautic\CoreBundle\Form\EventListener\FormExitSubscriber;
use Mautic\CoreBundle\Helper\LanguageHelper;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Translation\TranslatorInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BroadcastType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {   
        //Recipient input
        $builder->add(
            'recipient',
            ChoiceType::class,
            [
                'choices'  => [
                    '-- Select Recipient --' => 0,
                    'All Contacts (Leads)' => 1,
                    'Specific Contacts (Leads)' => 2,
                    'Specific Phone Numbers' => 3,
                ],
                'label'      => 'mautic.plugin.mocean.recipient',
                'label_attr' => ['class' => 'control-label'],
                'attr'       => ['class' => 'form-control'],
            ],
        );
        
        //Specific contacts input
        $builder->add(
            'specific_recipients',
            ChoiceType::class,
            [
                'choices'  =>  $options['choices'],
                'label'      => 'mautic.plugin.mocean.specific_leads',
                'label_attr' => ['class' => 'control-label'],
                'attr'       => ['class' => 'form-control', 'required' => false],
                'multiple'      => true,
            ],
        );
        
        //Specific phone numbers input
        $builder->add(
            'specific_numbers',
            TextareaType::class,
            [
                'label'      => 'mautic.plugin.mocean.specific_numbers',
                'label_attr' => ['class' => 'control-label'],
                'attr'       => ['class' => 'form-control', 'required' => false, 'placeholder' => 'Use space as delimiter, country code is required (e.g. 60123456789 60123456666)'],
            ]
        );
        
        //Message input
        $builder->add(
            'message',
            TextareaType::class,
            [
                'label'      => 'mautic.plugin.mocean.message',
                'label_attr' => ['class' => 'control-label'],
                'attr'       => ['class' => 'form-control'],
                'required'   => true,
            ]
        );
        
        //Submit button
        $builder->add(
            'send',
            SubmitType::class,
            [
                'label' => 'mautic.plugin.mocean.send',
                'attr'  => [
                    'class' => 'btn btn-default btn-save',
                    'icon' => 'fa fa-send text-success',
                    'onclick' => false
                ],
            ]
        );

        if (!empty($options['action'])) {
            $builder->setAction($options['action']);
        }
    }
    
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            [
                'choices'  => [],
            ]
        );
    }
}
