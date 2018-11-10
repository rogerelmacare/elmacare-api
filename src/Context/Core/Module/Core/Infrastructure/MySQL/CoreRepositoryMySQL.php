<?php

declare(strict_types=1);

namespace App\Context\Core\Module\Core\Infrastructure\MySQL;


use App\Context\Core\Module\Core\Domain\CoreRepository;
use App\Infrastructure\Shared\Domain\Core\Core;
use Doctrine\Common\Persistence\ManagerRegistry;
use PDO;

final class CoreRepositoryMySQL implements CoreRepository
{
    private const NUMBER_OF_LOGINS_AT_START_DAY = 0;
    private $em;

    public function __construct(ManagerRegistry $em)
    {
        $this->em = $em;
    }

    public function start(Core $core): void
    {
        $query = '
           INSERT INTO core (id, start_at, number_of_logins)
           VALUES (:id, :startAt, :numberOfLogins)
        ';

        $statement = $this->em->getConnection()->prepare($query);
        $statement->bindValue('id', $core->id()->value(), PDO::PARAM_STR);
        $statement->bindValue('startAt', $core->startAt()->value(), PDO::PARAM_STR);
        $statement->bindValue('numberOfLogins', self::NUMBER_OF_LOGINS_AT_START_DAY, PDO::PARAM_INT);

        $statement->execute();
    }
}