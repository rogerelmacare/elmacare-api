<?php

declare(strict_types=1);


namespace App\Controller\User;


use App\Context\User\Module\User\Application\Find\FindAllUsersQuery;
use Swagger\Annotations as SWG;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;

final class FindAllUsersController
{
    private $messageBus;

    public function __construct(MessageBusInterface $messageBus)
    {
        $this->messageBus = $messageBus;
    }

    /**
     * @Route("/api/users/findAll", methods={"GET"})
     * @SWG\Response(
     *     response=200,
     *     description="List of all users"
     * )
     * @SWG\Tag(name="Users")
     * @param Request $request
     * @return Response
     * @throws \Exception
     */
    public function __invoke(Request $request): Response
    {
        $findAllUsersQuery = new FindAllUsersQuery();
        $users             = $this->messageBus->dispatch($findAllUsersQuery);

        $response = new JsonResponse();
        $response->headers->set('Content-Type', 'application/json');
        $response->setStatusCode(Response::HTTP_OK);
        $response->setContent(json_encode($users));

        return $response;

    }
}