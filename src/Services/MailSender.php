<?php

namespace PlanejadorFinanceiro\Services;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class MailSender
{
    private $mailer;
    private $message;
    private $response;

    public function __construct()
    {
        $this->mailer = new PHPMailer(true);
    }

    public function send(string $userEmail, string $userName, string $attachment, string $attachmentName)
    {
        $this->buildMailer();
        $this->buildMessage($userName);
        
        $this->mailer->addAddress($userEmail);
        $this->mailer->Body = $this->message;

        $pdfContent = base64_decode($attachment);
        $this->mailer->AddStringAttachment($pdfContent, $attachmentName, 'base64', 'application/pdf');
        
        try {
            $this->mailer->send();
            $this->response = 'Email enviado para o mailer';
        } catch (Exception $e) {
            $this->response = $this->mailer->ErrorInfo;
        }
    }

    private function buildMailer()
    {
        $this->mailer->isSMTP();
        $this->mailer->Host = 'smtp.gmail.com';
        $this->mailer->SMTPAuth = true;
        $this->mailer->Username = 'planejadorfinanceiroepizy@gmail.com';
        $this->mailer->Password = 'pozeqemcfehchkma';
        $this->mailer->SMTPSecure = 'tls';
        $this->mailer->Port = 587;
        $this->mailer->setFrom($this->mailer->Username, 'Planejador Financeiro');
        $this->mailer->Subject = 'Seu planejamento financeiro!';
        $this->mailer->isHTML(true);
    }

    private function buildMessage($user)
    {
        $this->message = "
            <h1>Olá $user!</h1>
            <p>Seu planejamento financeiro gerado conosco está disponível em anexo!</p>
            <p>Obrigado por participar e boa sorte com suas finanças.</p>
        ";
    }

    public function getResponse(): string
    {
        return $this->response;
    }
}
