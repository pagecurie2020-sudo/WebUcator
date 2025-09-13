<?php
  //Import PHPMailer classes into the global namespace
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  require_once 'utilities.php';

  if (isProduction()) {
    require __DIR__ . '/../vendor/autoload.php';
    $host = 'email-smtp.us-east-1.amazonaws.com';
    $port = 587;
    $un = 'AKIAJRSJOIHFSCYMFTBA';
    $pw = 'AityOH2TQjjXH8mNfg4scnR3OEdre2z5mWO3DqyghKlD';
    $from = 'noreply@phppoetry.com';
    $fromName = 'PHP Poetry';
  } else {
    require "PHPMailer/PHPMailer.php";
    require "PHPMailer/SMTP.php";
    require "PHPMailer/Exception.php";
    require "email-info.php"; // Contains sensitive values
  }

  function prepMail($to, $toName, $html, $text, $subject) {
    global $host, $port, $un, $pw, $from, $fromName;
    $mail = new PHPMailer();
    // Uncomment this for debugging
    // $mail->SMTPDebug = 2;

    //Use SMTP
    $mail->isSMTP();
    if ($toName) {
      $mail->addAddress($to, $toName);
    } else {
      $mail->addAddress($to);
    }
    $mail->addReplyTo('noreply@phppoetry.com');
    $mail->addBcc('you@yoursite.com'); //BCC Yourself

    //Sender info set in included email-info.php
    $mail->Host = $host;
    $mail->Port = $port;
    $mail->SMTPSecure = 'tls'; // If this doesn't work, try 'STARTTLS'
    $mail->SMTPAuth = true;
    $mail->Username = $un;
    $mail->Password = $pw;
    $mail->setFrom($from, $fromName);

    $mail->isHTML(true); // send as HTML

    $mail->Subject = $subject;
    $mail->Body = $html;
    $mail->AltBody = $text;

    return $mail;
  }
?>