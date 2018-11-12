<?php

declare(strict_types=1);


namespace App\Context\Login\Module\Email\Infrastructure\Gmail;


use App\Context\Login\Module\Email\Domain\EmailRepository;
use App\Infrastructure\Shared\Domain\Email\LoginEmail;
use Swift_Mailer;
use Twig_Environment;
use Swift_Message;

final class EmailLoginRepositoryGmail implements EmailRepository
{
    private $mailer;
    private $templating;

    public function __construct(Swift_Mailer $mailer, Twig_Environment $templating)
    {
        $this->mailer     = $mailer;
        $this->templating = $templating;
    }

    public function send(LoginEmail $loginEmail)
    {

        $message = (new Swift_Message('Hello Email'))
            ->setSubject('[LOGIN REPORT]')
            ->setFrom('elmacare@elmacare.com')
            ->setTo('rogerelmacare@gmail.com')
            ->setBody(
                $this->templating->render(
                    'email/login.html.twig',
                    [
                        'name'     => $loginEmail->loginName()->value(),
                        'login_at' => $loginEmail->loginAt()->value(),
                        'status'   => $loginEmail->loginStatus()->value()
                    ]
                ),
                'text/html'
            );

        $this->mailer->send($message);
    }
}