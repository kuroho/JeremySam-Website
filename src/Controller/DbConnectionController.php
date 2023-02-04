<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DbConnectionController extends AbstractController
{
    #[Route('/db_connection', name: 'app_db_connection')]
    public function index(EntityManagerInterface $entity): Response
    {
        $connected = $entity->getConnection()->connect();
        $dbName = $entity->getConnection()->getDatabase();
        return $this->render('pages/db_connection/index.html.twig', [
            'isConnected' => $connected,
            'dbName' => $dbName,
        ]);
    }
}
