<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Validator\Constraints as Assert;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class,[
                'attr' => [
                    'class' => "form-control",
                    'minlength' => '2',
                    'maxlenght' => '50',
                ],
                'label' => 'Prénom',
                'label_attr' => [
                    'class' => "form-label mt-4",
                ],
                'constraints' => [
                    new Assert\Length(['min'=>2,'max'=>50, 'minMessage'=>"minErrorMessage",'maxMessage'=>"MaxErrorMessage"]),
                    new Assert\NotBlank(),
                ],
            ])
            ->add('surname', TextType::class,[
                'attr' => [
                    'class' => "form-control",
                    'minlength' => '2',
                    'maxlenght' => '50',
                ],
                'label' => 'Nom de famille',
                'label_attr' => [
                    'class' => "form-label mt-4",
                ],
                'constraints' => [
                    new Assert\Length(['min'=>2,'max'=>50, 'minMessage'=>"minErrorMessage",'maxMessage'=>"MaxErrorMessage"]),
                    new Assert\NotBlank(),
                ],
            ])
            ->add('email', EmailType::class,[
                'attr' => [
                    'class' => "form-control",
                    'minlength' => '2',
                    'maxlenght' => '50',
                ],
                'label' => 'Adresse Email',
                'label_attr' => [
                    'class' => "form-label mt-4",
                ],
                'constraints' => [
                    new Assert\Email(['message'=>"Cette adresse mail n'est pas une adresse mail valide"]),
                    new Assert\NotBlank(),
                ],
            ])
            ->add('submit', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-primary mt-4'
                ],
                'label' => 'Créer'
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
