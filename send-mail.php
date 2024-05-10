<?php

date_default_timezone_set('America/Fortaleza');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

// Env
$parsed = parse_ini_file("./env.init", true);

$host = $_ENV["SMTP_HOST"] = $parsed["SMTP_HOST"];
$port = $_ENV["SMTP_PORT"] = $parsed["SMTP_PORT"];
$username = $_ENV["SMTP_USERNAME"] = $parsed["SMTP_USERNAME"];
$password = $_ENV["SMTP_PASSWORD"] = $parsed["SMTP_PASSWORD"];
$mainHost = $_ENV["MAIN_HOST"] = $parsed["MAIN_HOST"];


if (isset($_POST["send"])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];
  $phone = $_POST['phone'];
  $date = date('d/m/Y',);
  $hour = date('H:i:s');

  $mail = new PHPMailer(true);

  try {
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail->Host = $host;
    $mail->SMTPAuth = true;
    $mail->Username = $username;
    $mail->Password = $password;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port = $port;

    $mail->setFrom($username, 'PMV');
    $mail->addAddress($username, 'PMV');
    $mail->addReplyTo($username, 'PMV');

    $mail->isHTML(true);
    $mail->CharSet = "UTF-8";
    $mail->Encoding = "base64";
    $mail->Subject = "Contato do Site";

    $body = "Mensagem enviada através do site pmvsegurancadotrabalho.com:<br><br>
                <p><strong>Nome: </strong>$name</p>
                <p><strong>E-mail: </strong>$email</p>
                <p><strong>Telefone: </strong>$phone</p>
                <p><strong>Mensagem:</strong></p>
                <p>$message</p>
                <p>Contato realizado em: <strong>$date</strong> às <strong>$hour</strong></p>";


    $mail->Body = $body;
    $mail->send();
    header("Location: $mainHost/obrigado.html");
  } catch (Exception $e) {
    echo "Ocorreu um erro, {mail->ErrorInfo}";
  }
} else {
  header("Location: index.html");
  exit();
}
