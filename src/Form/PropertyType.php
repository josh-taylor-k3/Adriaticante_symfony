<?php

namespace App\Form;

use App\Entity\Feature;
use App\Entity\Asset;
use App\Entity\Property;
use Gregwar\CaptchaBundle\Type\CaptchaType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\Dropzone\Form\DropzoneType;

class PropertyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class)
            ->add('price', IntegerType::class)
            ->add('description', TextareaType::class)
            ->add('area', IntegerType::class)
            ->add('totalRooms', ChoiceType::class, [
                'choices'  => [
                    '0' => 0,
                    '1' => 1,
                    '2' => 2,
                    '3' => 3,
                    '4' => 4,
                    '5' => 5,
                    '6' => 6,
                    '7' => 7,
                    '8' => 8,
                    '9' => 9,
                ],
            ])
            ->add('totalBedrooms', ChoiceType::class, [
                'choices'  => [
                    '0' => 0,
                    '1' => 1,
                    '2' => 2,
                    '3' => 3,
                    '4' => 4,
                    '5' => 5,
                    '6' => 6,
                    '7' => 7,
                    '8' => 8,
                    '9' => 9,
                ],
            ])
            ->add('totalBathrooms', ChoiceType::class, [
                'choices'  => [
                    '0' => 0,
                    '1' => 1,
                    '2' => 2,
                    '3' => 3,
                    '4' => 4,
                    '5' => 5,
                    '6' => 6,
                    '7' => 7,
                    '8' => 8,
                    '9' => 9,
                    '10' => 10,
                    '11' => 11,
                    '12' => 12,
                    '13' => 13,
                    '14' => 14,
                ],
            ])
            ->add('type', ChoiceType::class, [
                'choices'  => [
                    'Villa' => 'Villa',
                    'House' => 'House',
                    'Penthouse' => 'Penthouse',
                    'Apartment' => 'Apartment',
                    'Condo' => 'Condo',
                    'New Developments' => 'New Developments',
                    'Chalets' => 'Chalets',
                    'Commercial space' => 'Commercial space',
                ],
            ])
            ->add('advertType', ChoiceType::class, [
                'choices'  => [
                    'Purchase' => 'Purchase',
                    'Daily Rental' => 'Daily Rental',
                    'Monthly Rental' => 'Monthly Rental',
                ],
            ])
            ->add('linkWebsite', UrlType::class)
            ->add('phoneContact', TelType::class)
            ->add('nameContact', TextType::class)
            ->add('assets', CollectionType::class, [
                'entry_type' => AssetType::class,
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
                'required' => false,
                'error_bubbling' => false
            ])
            ->add('files', CollectionType::class, [
                'entry_type' => FileType::class,
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
                'required' => false,
                'error_bubbling' => false
            ])
            ->add('captcha', CaptchaType::class, [
                'label' => false,
                'quality' => 150,
                'keep_value'=> false,
                'invalid_message' => 'The code is not correct.',
                'distortion' => false,
                'interpolation' => false,
                'width' => 200,
                'height' => 50,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Property::class,
        ]);
    }
}
