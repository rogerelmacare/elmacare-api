<?php

declare(strict_types=1);


namespace App\Infrastructure\QueryHandler\User;


use App\Context\User\Module\User\Application\Find\FindAllUsersQuery;
use App\Context\User\Module\User\Application\Find\FindAllUsersQueryUseCase;

final class FindAllUsersQueryHandler
{
    private $useCase;

    public function __construct(FindAllUsersQueryUseCase $useCase)
    {
        $this->useCase = $useCase;
    }

    public function __invoke(FindAllUsersQuery $query): ?array
    {

        return $this->useCase->__invoke();

    }
}