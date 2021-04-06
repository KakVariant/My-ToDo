<?php
session_start();


require $_SERVER['DOCUMENT_ROOT'] . '/MyToDo/db/dbconfig.php';

$email = $_COOKIE["email"];

$result = $mysql->query("SELECT * FROM `register` WHERE `secure_key` = '$email' ORDER BY `register`.`email` DESC");
$mysql->close();
$row = $result->fetch_assoc();


$from = $row["email"];
$question = $_POST["question"];
$to = "rkhorolskij@gmail.com";
$subject = "Поддержка сайта MyToDo";
$subject = "=?utf-8?B?".base64_encode($subject)."?=";
$headers = "From: $from\r\nReply-to: $from\r\nContent-type: text/html; charset=\"utf-8\"\r\n";

$message = "Email отправителя - " . $from . " \nТекст сообщения - " . $question;

  $_SESSION["rep"] = "Сообщение успешно отправлено! Спасибо за отзыв/жалобу.";
  mail($to, $subject, $message, $headers);

header("Location: report.php");
 ?>
