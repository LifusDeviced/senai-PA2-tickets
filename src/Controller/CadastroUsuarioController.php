<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CadastroUsuarioController extends AbstractController
{
    /**
     * @Route("/cadastro", name="cadastro_usuario")
     */
    public function index()
    {
        return $this->render('cadastro_usuario/index.html.twig', [
            'controller_name' => 'CadastroUsuarioController',
        ]);
    }
}
