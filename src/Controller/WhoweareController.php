<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WhoweareController extends AbstractController
{
    #[Route('/whoweare', name: 'app_whoweare')]
    public function index(): Response
    {
        return $this->render('whoweare/index.html.twig', [
            'controller_name' => 'WhoweareController',
        ]);
    }
}
