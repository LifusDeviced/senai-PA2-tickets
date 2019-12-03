<?php

namespace App\Controller;

use App\Entity\Evento;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function gerenciarEventos()
    {
        $eventos = $this->getDoctrine()->getRepository(Evento::class)->findBy(
            array(),
            array('data' => 'ASC')
        );
        return $this->render('home/index.html.twig', [
            'eventos' => $eventos,
        ]);
    }
}
