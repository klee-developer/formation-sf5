<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SecurityController extends AbstractController
{
    /**
     * Login
     * @Route("/login")
     */
    public function login(): Response
    {
        return $this->render('security/login.html.twig');
    }

    /**
     * Register
     * @Route("/register")
     */
    public function register(): Response
    {
        return $this->render('security/register.html.twig');
    }

    /**
     * Register
     * @Route("/password-recovering")
     */
    public function passwordRecovering(): Response
    {
        return $this->render('security/password-recovering.html.twig');
    }
}
