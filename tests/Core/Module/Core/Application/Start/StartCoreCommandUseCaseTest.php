<?php

declare(strict_types=1);

namespace App\Tests\Core\Module\Core\Application\Start;

use App\Context\Core\Module\Core\Application\Start\StartCoreCommand;
use App\Tests\ApplicationTestCase;
use Ramsey\Uuid\Uuid;

final class StartCoreCommandUseCaseTest extends ApplicationTestCase
{

    public function testStartCoreCommandUseCase(): void
    {

        $uuid = Uuid::uuid4();
        $now  = new \DateTime('now');

        $command = new StartCoreCommand(
            $uuid->toString(),
            $now->format('Y-m-d H:i:s')
        );

        $this->dispatch($command);

        self::assertTrue(true);
    }
}