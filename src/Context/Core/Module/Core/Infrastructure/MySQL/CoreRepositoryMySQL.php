<?php

declare(strict_types=1);

namespace App\Context\Core\Module\Core\Infrastructure\MySQL;


use App\Context\Core\Module\Core\Domain\CoreRepository;
use App\Infrastructure\Shared\Domain\Core\Core;
use App\Infrastructure\Shared\Domain\Core\CoreStartAt;
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


    public function end(Core $core): void
    {
        $query = '
            UPDATE core
            SET end_at = :endAt
            WHERE id = :coreId; 
        ';

        $statement = $this->em->getConnection()->prepare($query);
        $statement->bindValue('endAt', $core->endAt()->value(), PDO::PARAM_STR);
        $statement->bindValue('coreId', $core->id()->value(), PDO::PARAM_STR);

        $statement->execute();
    }

    public function getTodayCore(CoreStartAt $coreStartAt): ?array
    {

        $query = '
            SELECT * FROM core WHERE DATE(start_at) = :startAt LIMIT 1;
        ';

        $statement = $this->em->getConnection()->prepare($query);
        $statement->bindValue('startAt', $coreStartAt->value(), PDO::PARAM_STR);
        $statement->execute();

        $core = $statement->fetch();

        return $core ?: null;
    }
}