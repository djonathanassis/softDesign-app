<?php

declare(strict_types=1);

namespace App\Service\Book;

use App\DTO\BooK\ListBookDto;
use App\Repository\Book\BookRepositoryInterface;
use App\Service\AbstractService;
use Knp\Component\Pager\PaginatorInterface;

class BookService extends AbstractService implements BookServiceInterface
{
    public function __construct(
        private readonly BookRepositoryInterface $bookRepository,
        private readonly PaginatorInterface $paginator
    ) {
        parent::__construct();
    }

    public function list(object $requestData): ListBookDto
    {
        return ListBookDto::responseData(
            $this->paginator->paginate(
                $this->bookRepository->filterByAllFields($requestData->search),
                $requestData->pageNumber,
                $requestData->pageSize
            ));
    }

    public function create(object $requestData): void
    {
        $this->bookRepository->save($requestData);
    }

    public function update($requestData = null): void
    {
        $this->bookRepository->save();
    }

    public function delete(object $requestData): void
    {
        $this->bookRepository->remove($requestData);
    }
}