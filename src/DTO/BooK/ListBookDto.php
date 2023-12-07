<?php

declare(strict_types=1);

namespace App\DTO\BooK;

use App\DTO\AbstractDto;
use Knp\Component\Pager\Pagination\PaginationInterface;

class ListBookDto extends AbstractDto
{

    public function __construct(
        readonly public PaginationInterface $books,
    ) {
    }

    public static function responseData(mixed $data): static
    {
        return new self(books: $data);
    }

}