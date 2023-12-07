<?php

declare(strict_types=1);

namespace App\ValueObject;

trait QueryStringTrait
{
    protected static array $expectedParams = [];

    public static function getSearch($query): object
    {
        $search = [];
        foreach (static::$expectedParams as $value) {

            if(!array_key_exists($value, $query->all())) {
                continue;
            }
            $search[$value] = $query->get($value);
        }
        return (object) $search;
    }
}