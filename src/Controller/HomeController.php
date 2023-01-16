<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\LibrariesService;

class HomeController extends AbstractController
{
    public function __construct(LibrariesService $lib)
    {
        $this->lib = $lib;
    }

    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'data' => $this->lib->getLibraries(),
        ]);
    }
}
