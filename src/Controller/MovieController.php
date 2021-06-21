<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MovieController extends AbstractController
{
    /**
     * Movie details
     * @Route("/movie/{id}", name="movie", requirements={"id"="\d+"}, methods={"GET"})
     */
    public function movieDetails($id): Response
    {
        return $this->render('movie/details.html.twig', [
            'id' => $id,
        ]);
    }

    /**
     * Top rated
     * @Route("/movie/top-rated")
     */
    public function movieTopRated(): Response
    {
        return $this->render('movie/top-rated.html.twig');
    }

    /**
     * Genres
     * @Route("/movie/genres")
     */
    public function movieGenres(): Response
    {
        return $this->render('movie/genres.html.twig');
    }

    /**
     * Top rated
     * @Route("/movie/latest")
     */
    public function movieLatest(): Response
    {
        return $this->render('movie/latest.html.twig');
    }
}
