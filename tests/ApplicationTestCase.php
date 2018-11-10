<?php

declare(strict_types=1);


namespace App\Tests;


use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Messenger\MessageBus;
use Symfony\Component\Messenger\MessageBusInterface;

abstract class ApplicationTestCase extends KernelTestCase
{

    private $commandBus;
    private $queryBus;

    protected function ask($query)
    {
        return $this->queryBus->handle($query);
    }

    protected function handle($command): void
    {
        $this->commandBus->handle($command);
    }

    protected function dispatch($command): void
    {
        $this->commandBus->dispatch($command);
    }

    protected function service(string $serviceId)
    {
        return self::$container->get($serviceId);
    }

//    protected function fireTerminateEvent(): void
//    {
//        /** @var EventDispatcherInterface $dispatcher */
//        $dispatcher = $this->service('event_dispatcher');
//
//        $dispatcher->dispatch(
//            KernelEvents::TERMINATE,
//            new PostResponseEvent(
//                static::$kernel,
//                Request::create('/'),
//                Response::create()
//            )
//        );
//    }

    protected function setUp()
    {
        static::bootKernel();

        $this->commandBus = new MessageBus();
//        $this->commandBus = $this->service('debug.traced.messenger.bus.default');

//        $this->queryBus = $this->service('messenger.bus.default');
    }

    protected function tearDown()
    {
        $this->commandBus = null;
        $this->queryBus   = null;
    }


}