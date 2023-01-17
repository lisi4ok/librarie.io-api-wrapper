<?php
namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ContainerBagInterface;

class LibrariesService
{
    private $client;
    private $params;

    public function __construct(HttpClientInterface $client, ContainerBagInterface $params)
    {
        $this->client = $client;
        $this->params = $params;
    }

    public function getLibraries(): array
    {
        $url = rtrim($this->params->get('librariesio_api_url'), '/')
            . '/' . $this->params->get('librariesio_default_search_query')
            . '&api_key=' . $this->params->get('librariesio_api_key')
        ;

        $response = $this->client->request(
            'GET',
            $url
        );

        $content = array_slice($response->toArray(), 0, 10);

        return $content;
    }

    public function searchLibraries(string $search): array
    {
        $url = rtrim($this->params->get('librariesio_api_url'), '/')
            . '/search?q=' . $search . '&api_key=' . $this->params->get('librariesio_api_key')
        ;

        $response = $this->client->request(
            'GET',
            $url
        );

        $content = $response->toArray();

        return $content;
    }

}