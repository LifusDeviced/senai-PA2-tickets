<?php

namespace App\Controller;

use App\Entity\Evento;
use App\Form\CadastroEventoType;
use App\Form\LocalEventoType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class CadastroEventoController extends AbstractController
{
    /**
     * @Route("/cadastroevento", name="cadastro_evento")
     */
    public function cadastro_evento (Request $request, ValidatorInterface $validator) : Response
    {
        $realizado = false;
        $evento = new Evento();

        $form = $this->createForm(CadastroEventoType::class, $evento);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $evento = $form->getData();
            $datas_registradas = $this->getDoctrine()->getRepository(Evento::class)->findDatas($evento->getIdLocalEvento()->getId());
            $data_comparada = $evento->getData();
            dump($data_comparada);
            foreach ($datas_registradas as $datas) {
                $datas_ocupadas[] = $datas['data'];
            }
            dump($datas_ocupadas);
            if (in_array($data_comparada, $datas_ocupadas)){

                $errodata = 'A data selecionada já está ocupada por outro evento';

                return $this->render('cadastro_evento/cadastroevento.html.twig', [
                    'form' => $form->createView(),
                    'realizado' => $realizado,
                    'errodata' => $errodata,
                ]);
            }
            else {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($evento);
            $entityManager->flush();

            $realizado = true;
            }
        }
            $errors = $validator->validate($form);

        return $this->render('cadastro_evento/cadastroevento.html.twig', [
            'form' => $form->createView(),
            'realizado' => $realizado,
            'errors' => $errors,
        ]);
    }
}
