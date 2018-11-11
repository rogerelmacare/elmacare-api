<?php

declare(strict_types=1);


namespace App\Controller\User;


use App\Context\User\Module\User\Application\Create\CreateUserCommand;
use Ramsey\Uuid\Uuid;
use Swagger\Annotations as SWG;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;

final class CreateUserController
{
    private $messageBus;

    public function __construct(MessageBusInterface $messageBus)
    {
        $this->messageBus = $messageBus;
    }

    /**
     * @Route("/api/users/create", methods={"POST"})
     * @SWG\Response(
     *     response=201,
     *     description="Creates a user"
     * ),
     * @SWG\Parameter(
     *     name="name",
     *     in="query",
     *     type="string",
     *     description="User name"
     * ),
     * @SWG\Parameter(
     *     name="surname",
     *     in="query",
     *     type="string",
     *     description="User surname"
     * ),
     * @SWG\Parameter(
     *     name="active",
     *     in="query",
     *     type="boolean",
     *     description="User active status"
     * ),
     * @SWG\Tag(name="Users")
     * @param Request $request
     * @return Response
     * @throws \Exception
     */
    public function __invoke(Request $request): Response
    {
        $uuid = Uuid::uuid4();
        $now  = new \DateTime('now');

        $createUserCommand = new CreateUserCommand(
            $uuid->toString(),
            $request->query->get('name'),
            $request->query->get('surname'),
            $now->format('Y-m-d H:i:s'),
            $now->format('Y-m-d H:i:s'),
            filter_var($request->query->get('active'), FILTER_VALIDATE_BOOLEAN)
        );

        $this->messageBus->dispatch($createUserCommand);

        $response = new JsonResponse();
        $response->setStatusCode(Response::HTTP_CREATED);

        return $response;
    }
}