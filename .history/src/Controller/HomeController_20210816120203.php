<?php

namespace App\Controller;

use App\Repository\ImageRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'home')]
    /**
     * @Route("/home", name="app_register")
     */
    public function index(ImageRepository $imageRepository): Response
    {
        $images=$imageRepository->findAll();
        return $this->render('home/index.html.twig', ['images' => $images,]);
    }
}
