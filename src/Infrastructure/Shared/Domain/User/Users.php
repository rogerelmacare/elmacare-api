<?php

declare(strict_types=1);

namespace App\Infrastructure\Shared\Domain\User;

use App\Infrastructure\Shared\Collection;

final class Users extends Collection
{

    public function __construct(array $items)
    {
        $users = [];
        foreach ($items as $item) {
            $users[] = new User(
                new UserId($item['id']),
                new UserName($item['name']),
                new UserSurname($item['surname']),
                new UserCreatedAt($item['created_at']),
                new UserUpdatedAt($item['updated_at']),
                new UserActive((bool)$item['active'])
            );
        }

        parent::__construct($users);
    }

    protected function type(): string
    {
        return User::class;
    }
}