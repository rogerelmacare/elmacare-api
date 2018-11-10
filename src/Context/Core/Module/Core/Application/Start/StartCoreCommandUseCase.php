<?php

declare(strict_types=1);


namespace App\Context\Core\Module\Core\Application\Start;


use App\Context\Core\Module\Core\Domain\CoreRepository;
use App\Infrastructure\Shared\Domain\Core\Core;

final class StartCoreCommandUseCase
{

    private $repositroy;

    public function __construct(CoreRepository $coreRepository)
    {
        $this->repositroy = $coreRepository;
    }

    public function __invoke(Core $core)
    {
        $this->repositroy->start($core);
    }
}