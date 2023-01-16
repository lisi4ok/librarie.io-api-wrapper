<?php

namespace App\Controller;

use KnpU\OAuth2ClientBundle\Client\ClientRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class SocialAuthenticationController extends AbstractController
{
    #[Route(path: '/connect/github', name: 'connect_github_start')]
    public function connectGithubAction(ClientRegistry $clientRegistry)
    {
        return $clientRegistry
            // ID used in config/packages/knpu_oauth2_client.yaml
            ->getClient('github_main')
            // Request access to scopes
            // https://github.com/thephpleague/oauth2-github
            ->redirect([
                'user:email'
            ])
            ;
    }

    #[Route(path: '/connect/github/check', name: 'connect_github_check')]
    public function connectGithubCheckAction(Request $request, ClientRegistry $clientRegistry)
    {
        return $this->redirectToRoute('app_home');
    }
}