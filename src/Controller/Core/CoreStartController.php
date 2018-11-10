<?php

declare(strict_types=1);

namespace App\Controller\Core;


use App\Context\Core\Module\Core\Application\Start\StartCoreCommand;
use Ramsey\Uuid\Uuid;
use Swagger\Annotations as SWG;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;

final class CoreStartController extends AbstractController
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