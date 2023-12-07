<?php

declare(strict_types=1);

namespace App\Validator\Book;

use App\Entity\Book;
use App\Validator\AbstractFormRequestValidator;

class BookFormRequestValidator extends AbstractFormRequestValidator
{

    protected mixed $book = Book::class;

}
