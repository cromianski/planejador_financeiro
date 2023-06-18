<?php

namespace PlanejadorFinanceiro;

use PlanejadorFinanceiro\MailSender;

class MailController
{
    public function sendAction($userEmail, $userName, $attachment, $attachmentName): string
    {
        $sender = new MailSender();
        $sender->send($userEmail, $userName, $attachment, $attachmentName);
        return $sender->getResponse();
    }
}
