<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class LoginUsuarioController extends AbstractController
{
    /**
     * @Route("/login", name="login_usuario")
     */
    public function index()
    {
        return $this->render('login_usuario/index.html.twig', [
            'controller_name' => 'LoginUsuarioController',
        ]);
    }
}
