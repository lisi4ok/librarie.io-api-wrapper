<?php

namespace App\Controller;

use KnpU\OAuth2ClientBundle\Client\ClientRegistry;
use League\OAuth2\Client\Provider\Exception\IdentityProviderException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class SocialAuthenticationController extends AbstractController
{
    /**
     * Link to this controller to start the "connect" process
     * @param ClientRegistry $clientRegistry
     *
     * @Route("/connect/github", name="connect_github_start")
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
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

    /**
     * After going to Github, you're redirected back here
     * because this is the "redirect_route" you configured
     * in config/packages/knpu_oauth2_client.yaml
     *
     * @param Request $request
     * @param ClientRegistry $clientRegistry
     *
     * @Route("/connect/github/check", name="connect_github_check")
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function connectGithubCheckAction(Request $request, ClientRegistry $clientRegistry)
    {
        return $this->redirectToRoute('app_home');
    }
}