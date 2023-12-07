<?php

declare(strict_types=1);

namespace App\DTO;


abstract class AbstractDto implements DtoInterface
{
    public function toArray(): array
    {
      return $this->all();
    }

    protected function all(): array
    {
        return get_object_vars($this);
    }
}
