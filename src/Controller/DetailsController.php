<?php

namespace App\Controller;

use App\Entity\Evento;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DetailsController extends AbstractController
{
    /**
     * @Route("/details", name="details")
     */
    public function details(Request $request)
    {
        $id =$request->get('eventos');
        if($id != null) {
            $evento = $this->getDoctrine()->getRepository(Evento::class)->find($id);
        }

        return $this->render('details/index.html.twig', [
            'evento' => $evento,
        ]);
    }
}
