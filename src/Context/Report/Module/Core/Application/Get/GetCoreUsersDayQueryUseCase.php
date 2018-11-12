<?php

declare(strict_types=1);


namespace App\Context\Report\Module\Core\Application\Get;


use App\Context\Report\Module\Core\Domain\ReportRepository;
use App\Infrastructure\Shared\Domain\Core\CoreId;

final class GetCoreUsersDayQueryUseCase
{
    private $repository;

    public function __construct(ReportRepository $coreRepository)
    {
        $this->repository = $coreRepository;
    }

    public function __invoke(CoreId $coreId): ?array
    {

        return $this->repository->getCoreUsersDayByCoreId($coreId);

//        $users  = [];
//        if ($result) {
//            foreach ($result as $user) {
//                $isLogged = $user['status'] === 'success';
//                $users[]  = new ReportEmail(
//                    new UserName($user['name']),
//                    new LoginStatus($isLogged),
//                    new LoginAt($user['login_at'])
//                );
//            }
//        }
//
//        return $users;

    }
}