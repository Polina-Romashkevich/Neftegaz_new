<?php

namespace App\Controller;

use App\Form\UserType;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

class RegistrationController extends Controller
{
    /**
     * @Route("/register", name="user_registration")
     */
    public function register(Request $request,
                             UserPasswordEncoderInterface $passwordEncoder,
                             AuthorizationCheckerInterface $authChecker)
    {
        if ($authChecker->isGranted('IS_AUTHENTICATED_FULLY'))
        {
            return $this->redirectToRoute('main');
        }

        // 1) строим форму
        $user = new User();
        $form = $this->createForm(UserType::class, $user);

        // 2) обработка запроса (произойдет в POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            // 3) закодировать пароль через доктрину
            $password = $passwordEncoder->encodePassword($user, $user->getPlainPassword());
            $user->setPassword($password);

            // 4) сохраняем пользователя
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();


            return $this->redirect('/login'); //возвращаем страницу с авторизацией//переадресация
        }

        return $this->render( //строитель форм
            'registration/register.html.twig', //название шаблона
            array('form' => $form->createView())  //требования синтаксиса
        );
    }
}