<?php

declare(strict_types=1);

namespace App\Partners\HgBrasil\Endpoints;

use App\Partners\HgBrasil\Entities\Weather;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;


class Weathers extends BaseEndpoint
{
    /**
     * @return Weather
     * @throws ClientExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public function findBy($requestData): Weather
    {
        $response = $this->request('/weather', (array)$requestData->search);
        return Weather::responseData($response->toArray());
    }

}