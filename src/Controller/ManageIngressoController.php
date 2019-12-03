<?php

namespace App\Controller;

use App\Entity\Ingresso;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ManageIngressoController extends AbstractController
{
    /**
     * @Route("/manageingresso", name="manage_ingresso")
     */
    public function manageUser()
    {
        $user = $this->getUser();
        dump($user);

        $ingressos = $this->getDoctrine()->getRepository(Ingresso::class)->findByCliente($user->getId());

        return $this->render('manage_ingresso/index.html.twig', [
            'ingressos' => $ingressos,
            'usuario' => $user,
        ]);
    }
}
