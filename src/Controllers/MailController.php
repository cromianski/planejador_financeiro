<?php

namespace PlanejadorFinanceiro\Controllers;

use PlanejadorFinanceiro\Services\MailSender;

class MailController
{
    public function sendAction(string $userEmail, string $userName, string $attachment, string $attachmentName): string
    {
        $sender = new MailSender();
        $sender->send($userEmail, $userName, $attachment, $attachmentName);
        return $sender->getResponse();
    }
}
