<?php

namespace Notifications;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Email
{

    private $mail = \stdClass::class;

    public function __construct($debug, $host, $user, $pass, $smtpSecure, $port, $fromEmail, $fromName)
    {
        $this->mail = new PHPMailer(true);
        $this->mail->SMTPDebug = $debug;
        $this->mail->isSMTP();
        $this->mail->Host       = $host;
        $this->mail->SMTPAuth   = true;
        $this->mail->Username   = $user;
        $this->mail->Password   = $pass;
        $this->mail->SMTPSecure = $smtpSecure;
        $this->mail->Port       = $port;
        $this->mail->CharSet    = 'utf-8';
        $this->mail->setLanguage('br', '/optional/path/to/language/directory/');
        $this->mail->isHTML(true);

        //Recipients
        $this->mail->setFrom($fromEmail, $fromName);
    }

    public function sendMail($subject, $body, $replyEmail, $replyName, $email, $name)
    {

        $this->mail->Subject = (string) $subject;
        $this->mail->Body = (string) $body;

        $this->mail->addReplyTo($replyEmail, $replyName);
        $this->mail->addAddress($email, $name);

        try {
            $this->mail->send();
        } catch (Exception $e) {
            echo "Erro: {$this->mail->ErrorInfo} {$e->getMessage()}";
        }
    }
}
