<?php

declare(strict_types=1);

namespace App\Service;

use App\Form\BookType;
use Symfony\Component\Form\Form;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Contracts\Translation\TranslatorInterface;

abstract class AbstractService
{
    public function __construct(
    )
    {
    }


}