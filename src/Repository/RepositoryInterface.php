<?php

declare(strict_types=1);

namespace App\Repository;

interface RepositoryInterface
{
    public function save(object $entity, bool $persist = false): void;

    public function remove(object $entity, bool $persist = false): void;
}