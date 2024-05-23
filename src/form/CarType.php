<?php
//src/Form/CarType.php
namespace App\Form;

use App\Entity\Car;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CarType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, ['label' => 'Nom de la voiture'])
            ->add('content', TextareaType::class, ['label' => 'Description'])
            ->add('monthlyPrice', NumberType::class, ['label' => 'Prix mensuel'])
            ->add('dailyPrice', NumberType::class, ['label' => 'Prix journalier'])
            ->add('places', ChoiceType::class, [
                'label' => 'Nombre de places',
                'choices' => range(1, 9),
                'choice_label' => function ($choice) {
                    return $choice; // affiche choices et non la clé du tableau par défaut a partir de 0
                }
            ])
            ->add('gearbox', ChoiceType::class, [
                'label' => 'Boîte de vitesse',
                'choices' => [
                    'Manuelle' => false,
                    'Automatique' => true,
                ],
            ]);
    }
    
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Car::class,
        ]);
    }
}