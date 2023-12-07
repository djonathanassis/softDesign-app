<?php

namespace App\Repository\Book;

use Doctrine\ORM\QueryBuilder;

interface BookRepositoryInterface
{
    public function filterByAllFields(object $search): QueryBuilder;
}