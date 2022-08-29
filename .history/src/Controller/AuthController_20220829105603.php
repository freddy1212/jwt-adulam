<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AuthController extends AbstractController
{
    #[Route('/auth', name: 'app_auth')]
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/AuthController.php',
        ]);
    }

    #[Route("/auth/register", name:"register", methods:["POST"])]
    public function register(Request $request, UserPasswordHasherInterface $PasswordHasher, ManagerRegistry $doctrine)
    {
        $password = $request->get('password');
        $email = $request->get('email');
        $user = new User();
        $user->setPassword($PasswordHasher->hashPassword($user, $password));
        $user->setEmail($email);
        $em = $doctrine->getManager();
        $em->persist($user);
        $em->flush();

        return new Response('Saved new product with id '.$product->getId());
    }
}
