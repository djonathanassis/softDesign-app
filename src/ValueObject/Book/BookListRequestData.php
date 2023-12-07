<?php

declare(strict_types=1);

namespace App\ValueObject\Book;

use App\ValueObject\AbstractRequestData;
use Symfony\Component\HttpFoundation\Request;

final class BookListRequestData extends AbstractRequestData
{
    protected static array $expectedParams = ['title', 'author'];
}
