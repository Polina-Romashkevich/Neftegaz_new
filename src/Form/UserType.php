<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        /*$builder
            ->add('email', EmailType::class)
            ->add('username', TextType::class)
            ->add('plainPassword', RepeatedType::class, array(
                'type' => PasswordType::class,
                'first_options'  => array('label' => 'Password'),
                'second_options' => array('label' => 'Repeat Password'),
            ))
        ;*/

        $builder
            ->add('username', TextType::class, [
                'label' => 'ФИО',
                'label_attr' => [
                    'class' => 'control-label'
                ],
                'attr' => [
                    'class' => 'form-control form-control-lg rounded-0',
                    'placeholder' => 'Введите ФИО'
                ],
                'required' => true
            ])

            ->add('company_name', TextType::class, [
                'label' => 'Название компании',
                'label_attr' => [
                    'class' => 'control-label'
                ],
                'attr' => [
                    'class' => 'form-control form-control-lg rounded-0',
                    'placeholder' => 'Введите название компании'
                ],
                'required' => true
            ])

            ->add('division_name', TextType::class, [
                'label' => 'Название подразделения',
                'label_attr' => [
                    'class' => 'control-label'
                ],
                'attr' => [
                    'class' => 'form-control form-control-lg rounded-0',
                    'placeholder' => 'Введите название подраздления (если есть)'
                ],
                'required' => false
            ])

            ->add('email', EmailType::class, [
                'label' => 'E-Mail',
                'label_attr' => [
                    'class' => 'control-label'
                ],
                'attr' => [
                    'class' => 'form-control form-control-lg rounded-0',
                    'placeholder' => 'Введите E-Mail'
                ],
                'required' => true
            ])
            ->add('plainPassword', RepeatedType::class, [
                'type' => PasswordType::class,
                'label' => false,
                'first_options'  => [
                    'label' => 'Пароль',
                    'label_attr' => [
                        'class' => 'control-label'
                    ],
                    'required' => false,
                    'attr' => [
                        'class' => 'form-control form-control-lg rounded-0',
                        'placeholder' => 'Введите пароль'
                    ]
                ],
                'second_options' => [
                    'label' => 'Пароль повторно',
                    'label_attr' => [
                        'class' => 'control-label'
                    ],
                    'required' => false,
                    'attr' => [
                        'class' => 'form-control form-control-lg rounded-0',
                        'placeholder' => 'Повторите ввод пароля'
                    ]
                ],
                'required' => false
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Регистрация',
                'attr' => [
                    'class' => 'btn btn-outline-dark btn-lg float-right',
                    'style' => 'display: block;'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver) //автоматически сгенерированный код
    {
        $resolver->setDefaults(array(
            'data_class' => User::class,
        ));
    }
}