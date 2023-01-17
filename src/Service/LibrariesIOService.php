<?php
namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ContainerBagInterface;

class LibrariesIOService
{
    public function __construct(private HttpClientInterface $client, private ContainerBagInterface $params)
    {
    }

    public function lastTenPHPLibraries(): array
    {
        $url = rtrim($this->params->get('librariesio_api_url'), '/')
            . '/' . $this->params->get('librariesio_default_search_query')
            . '&api_key=' . $this->params->get('librariesio_api_key')
            . '&page=1&per_page=10'
        ;

        $response = $this->client->request(
            'GET',
            $url
        );

        $content = $response->toArray();

        return $content;
    }

    public function searchLibraries(string $search, array $languages = [],
                                    array $platforms = [], array $keywords = [], array $licenses = []): array
    {

        if (!empty($languages)) {
            $languages = http_build_query($languages);
        }
        if (!empty($platforms))
        {
            $platforms = http_build_query($platforms);
        }
        if (!empty($keywords))
        {
            $keywords = http_build_query($keywords);
        }
        if (!empty($licenses))
        {
            $licenses = http_build_query($licenses);
        }

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

    public function platforms()
    {
        $url = rtrim($this->params->get('librariesio_api_url'), '/')
            . '/platforms?&api_key=' . $this->params->get('librariesio_api_key')
        ;

        $response = $this->client->request(
            'GET',
            $url
        );

        $content = $response->toArray();

        return $content;
    }

    public function lamnguages()
    {

        $platforms = $this->platforms();
        $languages = [];
        foreach ($platforms as $platform) {
            if (!empty($platform['default_language'])) {
                $languages[$platform['default_language']] =$platform['default_language'];
            }
        }

        return $languages;
    }

}