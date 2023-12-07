<?php

declare(strict_types=1);

namespace App\ValueObject;

use Symfony\Component\HttpFoundation\Request;

interface RequestDataInterface
{
    public static function createFromRequest(Request $request): self;
}
