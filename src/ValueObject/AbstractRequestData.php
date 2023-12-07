<?php

declare(strict_types=1);

namespace App\ValueObject;

use App\Enum\PaginationEnum;
use phpDocumentor\Reflection\Types\Self_;
use Symfony\Component\HttpFoundation\Exception\JsonException;
use Symfony\Component\HttpFoundation\InputBag;
use Symfony\Component\HttpFoundation\Request;

abstract class AbstractRequestData implements RequestDataInterface
{
    use QueryStringTrait;

    private const DEFAULT_PAGE_NUMBER = 1;

    private const DEFAULT_PAGE_SIZE = 10;

    public function __construct(
       readonly public object $search,
       readonly public ?string $queryString = null,
       readonly public ?string $rawPayload = null,
       readonly public int $pageNumber = self::DEFAULT_PAGE_NUMBER,
       readonly public int $pageSize = self::DEFAULT_PAGE_SIZE
    ) {}

    public static function createFromRequest(Request $request): static
    {
        $pageNumber = $request->query->getInt(PaginationEnum::PAGE_NUMBER->value);
        $pageNumber = $pageNumber > 0 ? $pageNumber : self::DEFAULT_PAGE_NUMBER;

        $pageSize = $request->query->getInt(PaginationEnum::PAGE_SIZE->value);
        $pageSize = $pageSize > 0 ? $pageSize : self::DEFAULT_PAGE_SIZE;

        return new static(
            search: self::getSearch($request->query),
            queryString: $request->getQueryString(),
            rawPayload: $request->getContent(),
            pageNumber: $pageNumber,
            pageSize: $pageSize,
        );
    }


}
