<?php

declare(strict_types=1);


namespace App\Infrastructure\QueryHandler\User;


use App\Context\User\Module\User\Application\Find\FindUserByIdQuery;
use App\Context\User\Module\User\Application\Find\FindUserByIdQueryUseCase;
use App\Infrastructure\Shared\Domain\User\User;
use App\Infrastructure\Shared\Domain\User\UserId;

final class FindUserByIdQueryHandler
{
    private $useCase;

    public function __construct(FindUserByIdQueryUseCase $useCase)
    {
        $this->useCase = $useCase;
    }

    public function __invoke(FindUserByIdQuery $query): ?User
    {
        $userId = new UserId($query->userId());


        return $this->useCase->__invoke($userId);

    }
}