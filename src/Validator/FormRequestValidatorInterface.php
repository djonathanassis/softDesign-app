<?php

declare(strict_types=1);

namespace App\Validator;

use App\ValueObject\RequestDataInterface;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;

interface FormRequestValidatorInterface
{
    /**
     * @throws HttpExceptionInterface
     */
    public function validate($request, string $type, mixed $data, array $options = []): FormInterface;

}
