<?php

declare(strict_types=1);

namespace App\DTO\BooK;

use App\DTO\AbstractDto;
use Symfony\Component\Form\FormInterface;

class UpdateBookDto extends AbstractDto
{
    public function __construct(
        readonly public mixed $book,
        readonly public FormInterface $form
    )
    {
    }

    public static function responseData(mixed $data): static
    {
        return new self(book: $data->getData(), form: $data);
    }
}