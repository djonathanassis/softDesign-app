<?php

declare(strict_types=1);

namespace App\DTO;

interface DtoInterface
{
    public function toArray(): array;

    public static function responseData(mixed $data): static;
}
