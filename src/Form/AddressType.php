<?php

namespace App\Form;

use App\Entity\Address;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddressType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('street_number', IntegerType::class, [
            'label' => 'address.street_number.label',
                'required' => true,
            ])
            ->add('street_address_line_1', TextType::class, [
                'label' => 'address.street_address_line_1.label',
                'required' => true,
            ])
            ->add('street_address_line_2', TextType::class, [
                'label' => 'address.street_address_line_2.label',
                'required' => false,
            ])
            ->add('city', TextType::class, [
                'label' => 'address.city.label',
                'required' => true,
            ])
            ->add('state_zip_code', IntegerType::class, [
                'label' => 'address.state_zip_code.label',
                'required' => true,
            ])
            ->add('country', CountryType::class, [
                'label' => 'address.country.label',
                'required' => true,
            ])
            ->add('county', TextType::class, [
                'label' => 'address.county.label',
                'required' => false,
            ])
            ->add('dialCode', ChoiceType::class, [
                'label' => 'address.dialCode.label',
                'choices' => [
                    '+33' => '+33 France',
                    '+385' => '+385 Croatia',
                    '+386' => '+386 Slovenia',
                    '+382' => '+382 Montenegro',
                    '+44' => '+44 UK',
                    '+49' => '+49 Germany',
                    '+41' => '+41 Switzerland',
                    '+34' => '+34 Spain',
                    '+351' => '+351 Portugal',
                    '+31' => '+31 Netherlands',
                    '+45' => '+45 Denmark',
                    '+46' => '+46 Sweden',
                    '+358' => '+358 Finland',
                    '+32' => '+32 Belgium',
                    '+381' => '+381 Serbia',
                    '+1' => '+1 USA/Canada',
                ],
            ])
            ->add('phone', TelType::class, [
                'label' => 'address.phone.label',
                'required' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Address::class,
            'translation_domain' => 'form',
        ]);
    }
}
