<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class LoginClienteController extends AbstractController
{
    /**
     * @Route("/login", name="login_cliente")
     */
    public function index()
    {
        return $this->render('login_cliente/index.html.twig', [
            'controller_name' => 'LoginClienteController',
        ]);
    }
}
