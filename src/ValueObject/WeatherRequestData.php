<?php

namespace App\ValueObject;

class WeatherRequestData extends AbstractRequestData
{
    protected static array $expectedParams = ['woeid', 'user_ip', 'city_name'];

}