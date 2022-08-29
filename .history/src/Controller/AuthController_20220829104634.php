<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AuthController extends AbstractController
{
    #[Route('/auth', name: 'app_auth')]
    public function index(): Response
    {
        return $this->Response;
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
    }
}
