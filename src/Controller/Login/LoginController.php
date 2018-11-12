<?php

declare(strict_types=1);


namespace App\Controller\Login;


use App\Context\Core\Module\Core\Application\Get\GetTodayCoreQuery;
use App\Context\Login\Module\Login\Application\Login\LoginCommand;
use App\Context\User\Module\User\Application\Find\FindUserByIdQuery;
use App\Infrastructure\Shared\Domain\User\User;
use Ramsey\Uuid\Uuid;
use Swagger\Annotations as SWG;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;

final class LoginController
{
    private $messageBus;

    public function __construct(MessageBusInterface $messageBus)
    {
        $this->messageBus = $messageBus;
    }

    /**
     * @Route("/api/login", methods={"POST"})
     * @SWG\Response(
     *     response=200,
     *     description="Login"
     * ),
     * @SWG\Parameter(
     *     name="uuid",
     *     in="query",
     *     type="string",
     *     description="User ID"
     * ),
     * @SWG\Tag(name="Login")
     * @param Request $request
     * @return Response
     * @throws \Exception
     */
    public function __invoke(Request $request): Response
    {
        $now = new \DateTime('now');

        $getUserByIdQuery = new FindUserByIdQuery($request->query->get('uuid'));
        $user             = $this->messageBus->dispatch($getUserByIdQuery);

        if (!$user ){
            $response = new JsonResponse();
            $response->setStatusCode(Response::HTTP_NOT_FOUND);
            $response->setJson(json_encode('User not found'));

            return $response;
        }

        $getTodayCoreCommand = new GetTodayCoreQuery($now->format('Y-m-d'));
        $core                = $this->messageBus->dispatch($getTodayCoreCommand);
        if (!$core ){
            $response = new JsonResponse();
            $response->setStatusCode(Response::HTTP_NOT_FOUND);
            $response->setJson(json_encode('Core not found'));

            return $response;
        }

        $userActive = $this->guardUserIsActive($user);

        $uuid         = Uuid::uuid4();
        $now          = new \DateTime('now');
        $loginCommand = new LoginCommand(
            $uuid->toString(),
            $core->id()->value(),
            $user->id()->value(),
            $userActive,
            $now->format('Y-m-d H:i:s')
        );
        $this->messageBus->dispatch($loginCommand);





        $response = new JsonResponse();
        $response->setStatusCode(Response::HTTP_OK);

        return $response;

    }

    private function guardUserIsActive(User $user): bool
    {
        return $user->active()->value() !== false;
    }
}

