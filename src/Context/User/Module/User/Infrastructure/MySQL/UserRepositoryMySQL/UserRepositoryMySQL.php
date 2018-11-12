<?php

declare(strict_types=1);


namespace App\Context\User\Module\User\Infrastructure\MySQL\UserRepositoryMySQL;


use App\Context\User\Module\User\Domain\UserRepository;
use App\Infrastructure\Shared\Domain\User\User;
use App\Infrastructure\Shared\Domain\User\UserId;
use Doctrine\Common\Persistence\ManagerRegistry;
use PDO;

final class UserRepositoryMySQL implements UserRepository
{
    private $em;

    public function __construct(ManagerRegistry $em)
    {
        $this->em = $em;
    }

    public function create(User $user): void
    {
        $query = '
           INSERT INTO user (id, name, surname, created_at, updated_at, active)
           VALUES (:id, :userName, :userSurname, :created_at, :updated_at, :active)
        ';

        $statement = $this->em->getConnection()->prepare($query);
        $statement->bindValue('id', $user->id()->value(), PDO::PARAM_STR);
        $statement->bindValue('userName', $user->name()->value(), PDO::PARAM_STR);
        $statement->bindValue('userSurname', $user->surname()->value(), PDO::PARAM_STR);
        $statement->bindValue('created_at', $user->createdAt()->value(), PDO::PARAM_STR);
        $statement->bindValue('updated_at', $user->updatedAt()->value(), PDO::PARAM_STR);
        $statement->bindValue('active', $user->active()->value(), PDO::PARAM_BOOL);

        $statement->execute();

    }

    public function findAll(): array
    {
        $query = '
          SELECT * FROM user ORDER BY name ASC;
        ';

        $statement = $this->em->getConnection()->prepare($query);
        $statement->execute();

        $users = $statement->fetchAll();

        if ($users) {
            return $users;
        }

        return [];
    }

    public function findById(UserId $userId): ?array
    {
        $query = '
          SELECT * FROM user WHERE id = :userId LIMIT 1;
        ';


        $statement = $this->em->getConnection()->prepare($query);
        $statement->bindValue('userId', $userId->value(), PDO::PARAM_STR);
        $statement->execute();
        $user = $statement->fetch();

        return $user ?: null;

    }
}