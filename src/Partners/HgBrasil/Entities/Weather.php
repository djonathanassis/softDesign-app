<?php

declare(strict_types=1);

namespace App\Partners\HgBrasil\Entities;

use App\DTO\AbstractDto;
use Symfony\Component\Console\Input\ArrayInput;

class Weather extends AbstractDto
{

    public function __construct(
        readonly public int $temp,
        readonly public string $date,
        readonly public string $time,
        readonly public string $condition_code,
        readonly public string $description,
        readonly public string $correnntly,
        readonly public string $cid,
        readonly public string $city,
        readonly public string $img_id,
        readonly public int $humidity,
        readonly public float $cloudiness,
        readonly public float $rain,
        readonly public string $wind_speedy,
        readonly public int $wind_direction,
        readonly public string $wind_cardinal,
        readonly public string $sunrise,
        readonly public string $sunset,
        readonly public string $moon_phase,
        readonly public string $city_name,
        readonly public string $timezone,
        readonly public array $forecast,
        readonly public string $cref,
    )
    {
    }

    public static function responseData(mixed $data): static
    {
        $data = $data['results'];

        return new self(
            temp: $data['temp'],
            date: $data['date'],
            time: $data['time'],
            condition_code: $data['condition_code'],
            description: $data['description'],
            correnntly: $data['currently'],
            cid: $data['cid'],
            city: $data['city'],
            img_id: $data['img_id'],
            humidity: $data['humidity'],
            cloudiness: $data['cloudiness'],
            rain: $data['rain'],
            wind_speedy: $data['wind_speedy'],
            wind_direction: $data['wind_direction'],
            wind_cardinal: $data['wind_cardinal'],
            sunrise: $data['sunrise'],
            sunset: $data['sunset'],
            moon_phase: $data['moon_phase'],
            city_name: $data['city_name'],
            timezone: $data['timezone'],
            forecast: $data['forecast'],
            cref: $data['cref'],
        );
    }
}