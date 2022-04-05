<?php

require __DIR__ . '/../lib_ext/autoload.php';

use Notifications\Email;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\PHPMailer;

$body = "<p>verificando meu primeiro email</p>";

$notification = new Email();
$notification->sendMail();
