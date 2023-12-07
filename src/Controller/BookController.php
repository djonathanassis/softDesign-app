<?php

declare(strict_types=1);

namespace App\Controller;

use App\DTO\BooK\CreateBookDto;
use App\DTO\BooK\UpdateBookDto;
use App\Entity\Book;
use App\Form\BookType;
use App\Service\Book\BookServiceInterface;
use App\Validator\FormRequestValidatorInterface;
use App\ValueObject\Book\BookListRequestData;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/book')]
class BookController extends AbstractController
{
    public function __construct(
        private readonly BookServiceInterface $bookService,
        private readonly FormRequestValidatorInterface $formRequestValidator,
    ) {
    }

    #[Route('/', name: 'app_book_index', methods: ['GET'])]
    public function index(Request $request): Response
    {
        $requestData = BookListRequestData::createFromRequest($request);

        $response = $this->bookService->list($requestData);

        return $this->render('book/index.html.twig', $response->toArray());
    }

    /**
     * @throws HttpExceptionInterface
     */
    #[Route('/new', name: 'app_book_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $form = $this->formRequestValidator
            ->validate($request, BookType::class);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->bookService->create($form->getData());

            return $this->redirectToRoute('app_book_index', [],
                Response::HTTP_SEE_OTHER);
        }

        $response = CreateBookDto::responseData($form);

        return $this->render('book/new.html.twig', $response->toArray());
    }

    #[Route('/{id}', name: 'app_book_show', methods: ['GET'])]
    public function show(Book $book): Response
    {
        return $this->render('book/show.html.twig', ['book' => $book]);
    }

    /**
     * @throws HttpExceptionInterface
     */
    #[Route('/{id}/edit', name: 'app_book_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Book $book): Response
    {
        $form = $this->formRequestValidator
            ->validate($request, BookType::class, $book);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->bookService->update();

            return $this->redirectToRoute('app_book_index', [],
                Response::HTTP_SEE_OTHER);
        }

        $response = UpdateBookDto::responseData($form);

        return $this->render('book/edit.html.twig', $response->toArray());
    }

    #[Route('/{id}', name: 'app_book_delete', methods: ['POST'])]
    public function delete(Request $request, Book $book): Response
    {
        if ($this->isCsrfTokenValid('delete'.$book->getId(),
            $request->request->get('_token'))) {
            $this->bookService->delete($book);
        }

        return $this->redirectToRoute('app_book_index', [],
            Response::HTTP_SEE_OTHER);
    }
}
