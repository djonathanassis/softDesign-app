<?php

declare(strict_types=1);

namespace App\Partners\HgBrasil;

use App\Partners\HgBrasil\Endpoints\Weathers;

class HGWeather
{
    public static function weather(): Weathers
    {
        return new Weathers();
    }

}