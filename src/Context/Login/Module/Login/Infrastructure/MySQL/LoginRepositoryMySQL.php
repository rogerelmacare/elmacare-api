<?php

declare(strict_types=1);


namespace App\Context\Login\Module\Login\Infrastructure\MySQL;


use App\Context\Login\Module\Login\Domain\LoginRepository;
use App\Infrastructure\Shared\Domain\Login\Login;
use Doctrine\Common\Persistence\ManagerRegistry;
use PDO;

final class LoginRepositoryMySQL implements LoginRepository
{
    private $em;

    public function __construct(ManagerRegistry $em)
    {
        $this->em = $em;
    }

    public function login(Login $login): void
    {
        $query = '
           INSERT INTO core_logins (id, core_id, user_id, login_at, status)
           VALUES (:id, :acmeId, :userId, :loginAt, :status)
        ';

        $loginStatus = $login->status()->value() ? 'success' : 'rejected';


        $statement = $this->em->getConnection()->prepare($query);
        $statement->bindValue('id', $login->loginId()->value(), PDO::PARAM_STR);
        $statement->bindValue('acmeId', $login->coreId()->value(), PDO::PARAM_STR);
        $statement->bindValue('userId', $login->userId()->value(), PDO::PARAM_STR);
        $statement->bindValue('loginAt', $login->loginAt()->value(), PDO::PARAM_STR);
        $statement->bindValue('status', $loginStatus, PDO::PARAM_STR);
        $statement->execute();
    }
}