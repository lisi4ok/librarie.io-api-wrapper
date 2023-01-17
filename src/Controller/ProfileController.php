<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\LibrariesIOService;

class ProfileController extends AbstractController
{
    public function __construct(private LibrariesIOService $librariesIOService)
    {
    }

    #[Route('/profile', name: 'app_profile')]
    public function index(Request $request): Response
    {
        if ($keyword = $request->request->get('search')) {
            $data = $this->librariesIOService->searchLibraries($keyword);
        } else {
            $data = $this->librariesIOService->lastTenPHPLibraries();
        }


        return $this->render('profile/index.html.twig', [
            'controller_name' => 'ProfileController',
            'data'    => $data,
            'keyword' => $keyword,
        ]);
    }
}
