<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DetailsController2 extends AbstractController
{
    /**
     * @Route("/details2", name="details2")
     */
    public function index2()
    {
        return $this->render('details2/index2.html.twig', [
            'controller_name' => 'DetailsController2',
        ]);
    }
}