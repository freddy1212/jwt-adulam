<?php

namespace App\Controller;

use Container8tvTBNt\getSecurity_Command_UserPasswordHashService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

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
    public function register(Request $request, getSecurity_Command_UserPasswordHashService)
}
