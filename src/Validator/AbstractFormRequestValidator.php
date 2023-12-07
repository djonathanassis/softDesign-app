<?php

declare(strict_types=1);

namespace App\Validator;

use App\Entity\Book;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;

abstract class AbstractFormRequestValidator implements FormRequestValidatorInterface
{

    protected mixed $book;

    public function __construct(
        protected FormFactoryInterface $formFactory,
    ) {
    }

    /**
     * @throws \Exception
     */
    public function validate(
        $request,
        string $type = FormType::class,
        mixed $data = null, array $options = []): FormInterface
    {
        if($data === null) {
           $data = new $this->book();
        }

        return $this->formFactory->create($type,  $data, $options)->handleRequest($request);
    }
}
