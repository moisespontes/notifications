<?php

require __DIR__ . '/vendor/autoload.php';

use Notifications\Email;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\PHPMailer;

$notification = new Email();
$notification->sendMail();
