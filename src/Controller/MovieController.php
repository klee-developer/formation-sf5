<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MovieController extends AbstractController
{
    /**
     * @Route("/movie/{id}", name="movie", requirements={"id"="\d+"}, methods={"GET"})
     */
    public function index($id): Response
    {
        return new Response('Hello ' . $id, 200);
//        return $this->json([
//            'message' => 'Welcome to your new controller!',
//            'path' => 'src/Constroller/MovieController.php'
//        ]);
    }

    /**
     * @Route("/movie/top-rated")
     */
    public function index2(): Response
    {
        return new Response('Top rated page');
    }

    /**
     * Avec template
     * @Route("/movie", name="movie")
     */
    public function index3(): Response
    {
        return $this->render('movie/index.html.twig', [
            'controller_name' => 'MovieController template',
        ]);
    }
}
