<?php

declare(strict_types=1);

namespace App\Service\Book;

use App\DTO\BooK\ListBookDto;

interface BookServiceInterface
{
    public function list(object $requestData): ListBookDto;

    public function create(object $requestData): void;

    public function update(?object $requestData): void;

    public function delete(object $requestData): void;

}