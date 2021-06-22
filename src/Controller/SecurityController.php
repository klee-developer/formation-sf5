<?php

namespace App\Controller;

use App\Form\RegisterType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type as Type;

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
    public function register(Request $request): Response
    {
        $form = $this->createForm(RegisterType::class);
        $form->add('register', Type\SubmitType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            dump($form->getData());
        }

        return $this->render('security/register.html.twig', [
            'form' => $form->createView()
        ]);
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
