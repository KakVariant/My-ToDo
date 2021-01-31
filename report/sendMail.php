<?php
session_start();
$from = $_COOKIE["email"];
$question = $_POST["question"];
$to = "rkhorolskij@gmail.com";
$subject = "Поддержка сайта MyToDo";
$subject = "=?utf-8?B?".base64_encode($subject)."?=";
$headers = "From: $from\r\nReply-to: $from\r\nContent-tupe: text/plain; charset=utf-8\r\n";

$message = "Email отправителя - " . $from . " \nТекст сообщения - " . $question;

  $_SESSION["rep"] = "Сообщение успешно отправлено! Спасибо за отзыв/жилобу.";
  mail($to, $subject, $message, $headers);

header("Location: report.php");
 ?>
