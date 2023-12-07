<?php

declare(strict_types=1);

namespace App\Partners\HgBrasil\Endpoints;

use App\Partners\HgBrasil\Contracts\EndpointInterface;
use RuntimeException;
use Symfony\Component\HttpClient\Exception\ClientException;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

class BaseEndpoint implements EndpointInterface
{
    protected HttpClientInterface $httpClient;

    public function __construct()
    {
        $this->httpClient = HttpClient::createForBaseUri($_ENV['HG_BRASIL_API_URL']);
    }

    /**
     * @throws ClientExceptionInterface|RuntimeException
     */
    protected function request(string $endpoint, array $query = []): ResponseInterface
    {
        try {
            return $this->httpClient->request('GET', $endpoint, [
                'query' => array_merge(
                    [
                        'key' => $_ENV['HG_BRASIL_API_KEY'],
                        'format' => 'json',
                        'locale' => 'pt'
                    ], $query)
            ]);

        } catch (ClientExceptionInterface $ce) {
            throw new ClientException($ce->getResponse());
        } catch (TransportExceptionInterface $e) {
            throw new RuntimeException($e->getMessage());
        }
    }

}