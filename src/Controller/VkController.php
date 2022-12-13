<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VkController extends AbstractController
{
    #[Route('/vk', name: 'app_vk')]
    public function index(): Response
    {
        return $this->render('vk/index.html.twig', [
            'controller_name' => 'VkController',
        ]);
    }
}
