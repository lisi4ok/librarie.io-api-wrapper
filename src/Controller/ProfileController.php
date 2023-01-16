<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\LibrariesService;


class ProfileController extends AbstractController
{
    private $lib;

    public function __construct(LibrariesService $lib)
    {
        $this->lib = $lib;
    }

    #[Route('/profile', name: 'app_profile')]
    public function index(): Response
    {
        return $this->render('profile/index.html.twig', [
            'controller_name' => 'ProfileController',
            'data' => $this->lib->getLibraries(),
        ]);
    }
}
