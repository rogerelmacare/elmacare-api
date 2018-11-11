<?php

declare(strict_types=1);


namespace App\Controller\Core;


use App\Context\Core\Module\Core\Application\End\EndCoreCommand;
use App\Context\Core\Module\Core\Application\Get\GetTodayCoreQuery;
use Swagger\Annotations as SWG;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;

final class CoreEndController extends AbstractController
{
    private $messageBus;

    public function __construct(MessageBusInterface $messageBus)
    {
        $this->messageBus = $messageBus;
    }

    /**
     * @Route("/api/core/end", methods={"POST"})
     * @SWG\Response(
     *     response=200,
     *     description="Ends core"
     * )
     * @SWG\Tag(name="Core")
     */
    public function __invoke(): Response
    {
        $now = new \DateTime('now');

        $getTodayCoreCommand = new GetTodayCoreQuery(
            $now->format('Y-m-d')
        );

        $core = $this->messageBus->dispatch($getTodayCoreCommand);

        if ($core) {
            $endCoreCommand = new EndCoreCommand(
                (string)$core->id(),
                $core->startAt()->value(),
                $now->format('Y-m-d H:i:s'),
                $core->numberOfLogins()->value()
            );

            $this->messageBus->dispatch($endCoreCommand);

            $response = new JsonResponse();
            $response->setStatusCode(Response::HTTP_OK);

            return $response;
        }
    }

}