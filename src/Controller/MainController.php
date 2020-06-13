<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class MainController extends Controller
{
    /**
     * @Route("/", name="index")
     * @Security("has_role('ROLE_USER')")
     */
    public function index() //войти в систему
    {
        return $this->render('main/index.html.twig', [

        ]);
    }

    /**
     * @Route("/logout", name="logout")
     */
    public function logout() //выйти из системы
    {
        return $this->render('main/index.html.twig', [

        ]);
    }
}
