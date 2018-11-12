<?php

declare(strict_types=1);


namespace App\Context\Report\Module\Core\Infrastructure\MySQL;


use App\Context\Report\Module\Core\Domain\ReportRepository;
use App\Infrastructure\Shared\Domain\Core\CoreId;
use Doctrine\Common\Persistence\ManagerRegistry;
use PDO;

final class ReportRepositoryMySQL implements ReportRepository
{
    private $em;

    public function __construct(ManagerRegistry $em)
    {
        $this->em = $em;
    }

    public function getCoreUsersDayByCoreId(CoreId $coreId): ?array
    {
        $query = '
            SELECT 
                u.name, cl.status, cl.login_at
            FROM
                core_logins cl
            LEFT JOIN user u ON (cl.user_id = u.id)
            WHERE
                core_id = :coreId
        ';

        $statement = $this->em->getConnection()->prepare($query);
        $statement->bindValue('coreId', $coreId->value(), PDO::PARAM_STR);
        $statement->execute();

        return $statement->fetchAll();

    }

}