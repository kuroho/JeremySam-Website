<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class homeController extends AbstractController
{
    #[Route('/', name: 'index.html.twig')]
    public function index(): Response
    {
        return $this->render('pages/index.html.twig', [
            'controller_name' => 'homeController',
        ]);
    }
}
