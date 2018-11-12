<?php

declare(strict_types=1);

namespace App\Controller\Core;


use App\Context\Core\Module\Core\Application\Get\GetTodayCoreQuery;
use App\Context\Core\Module\Core\Application\Start\StartCoreCommand;
use Ramsey\Uuid\Uuid;
use Swagger\Annotations as SWG;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;

final class CoreStartController
{
    private $messageBus;

    public function __construct(MessageBusInterface $messageBus)
    {
        $this->messageBus = $messageBus;
    }

    /**
     * @Route("/api/core/start", methods={"POST"})
     * @SWG\Response(
     *     response=201,
     *     description="Start core"
     * )
     * @SWG\Tag(name="Core")
     */
    public function __invoke(): Response
    {
        $uuid = Uuid::uuid4();
        $now  = new \DateTime('now');

        $getTodayCoreCommand = new GetTodayCoreQuery($now->format('Y-m-d'));
        $core                = $this->messageBus->dispatch($getTodayCoreCommand);
        if ($core ){
            $response = new JsonResponse();
            $response->setStatusCode(Response::HTTP_OK);
            $response->setJson(json_encode('Core already started'));

            return $response;
        }

        $startCoreCommand = new StartCoreCommand(
            $uuid->toString(),
            $now->format('Y-m-d H:i:s')
        );
        $this->messageBus->dispatch($startCoreCommand);

        $response = new JsonResponse();
        $response->setStatusCode(Response::HTTP_OK);

        return $response;
    }
}