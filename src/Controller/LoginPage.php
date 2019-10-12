<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

    class LoginPage extends AbstractController {
        /**
        * @Route("/login")
        */
        public function mount() {
            return $this->render("login.html.twig");
        }
    }