<?php

declare(strict_types=1);


namespace App\Context\Report\Module\Core\Infrastructure\Gmail;

use App\Context\Report\Module\Core\Domain\ReportGmailRepository;
use Swift_Mailer;
use Twig_Environment;

final class ReportRepositoryGmail implements ReportGmailRepository
{
    private $mailer;
    private $templating;

    public function __construct(Swift_Mailer $mailer, Twig_Environment $templating)
    {
        $this->mailer     = $mailer;
        $this->templating = $templating;
    }

    public function send(array $users): void
    {
        $message = (new \Swift_Message('Report Day'))
            ->setSubject('[END OF THE DAY REPORT]')
            ->setFrom('elmacare@elmacare.com')
            ->setTo('rogerelmacare@gmail.com')
            ->setBody(
                $this->templating->render(
                    'email/report_day.html.twig',
                    [
                        'users' => $users
                    ]
                ),
                'text/html'
            );

        $this->mailer->send($message);
    }
}