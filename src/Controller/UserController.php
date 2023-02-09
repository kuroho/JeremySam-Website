<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    #[Route('/user', name: 'app_user')]
    public function index(UserRepository $repository): Response
    {
        $user = $repository->findAll();
        return $this->render('/pages/user/index.html.twig', [
            'users' => $user,
        ]);
    }
    
    #[Route('/user/new', name:'user.new', methods:['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $manager) : Response
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();
            $user->setIp($request->getClientIp());
            $manager->persist($user);
            $manager->flush();
            return $this->redirectToRoute('app_user');
        }
        return $this->render('pages/user/new.html.twig', [
            'form' => $form,
        ]);
    }
}
