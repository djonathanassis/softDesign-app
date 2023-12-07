<?php

namespace App\Controller;

use App\Partners\HgBrasil\HGWeather;
use App\ValueObject\WeatherRequestData;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;

class WeatherController extends AbstractController
{
    /**
     * @throws ClientExceptionInterface
     */
    #[Route('/weather', name: 'app_weather', methods: ['GET'])]
    public function index(Request $request): Response
    {
        $requestData = WeatherRequestData::createFromRequest($request);

        $result = HGWeather::weather()->findBy($requestData);

        dd($result);

        return $this->render('weather/index.html.twig', [
            'controller_name' => 'WeatherController',
        ]);
    }
}
