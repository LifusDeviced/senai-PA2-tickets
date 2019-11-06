<?php

namespace App\Controller;

use App\Entity\Evento;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DetailsController extends AbstractController
{
    /**
     * @Route("/details/{id}", name="details")
     */
    public function index(Evento $evento)
    {
        return $this->render('details/index.html.twig', [
            'evento' => $evento,
        ]);
    }
}
