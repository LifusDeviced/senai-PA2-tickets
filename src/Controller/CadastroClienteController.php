<?php

namespace App\Controller;

use App\Entity\Cliente;
use App\Form\CadastroClienteType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CadastroClienteController extends AbstractController
{
    /**
     * @Route("/cadastro", name="cadastro_cliente")
     */
    public function cadastro_cliente (Request $request) : Response
    {
        $realizado = false;
        $cliente = new Cliente();

        $form = $this->createForm(CadastroClienteType::class, $cliente);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $cliente = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($cliente);
            $entityManager->flush();

            $realizado = true;
        }

        return $this->render('cadastro_cliente/index.html.twig', [
            'controller_name' => 'CadastroClienteController',        
            'form' => $form->createView(),
            'realizado' => $realizado,
        ]);
    }
}
