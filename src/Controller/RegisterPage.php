<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

    class RegisterPage extends AbstractController {
        /**
        * @Route("/register")
        */
        public function mount() {
            return $this->render("register.html.twig");
        }
    }