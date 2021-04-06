<?php
require $_SERVER['DOCUMENT_ROOT'] . '/MyToDo/db/dbconfig.php';
session_start();

$email = $_POST["email"];

  $result = $mysql->query("SELECT * FROM `register` WHERE `email` = '$email'");

  $user = $result->fetch_assoc();
  if (count($user) == 0)
  {
      $_SESSION["err"] = "Ошибка! Такого пользователя не существует!";
      header("Location: /MyToDo/action/recovery.php");
      exit();
  }
  else
  {
    $newPass = rand(1000, 999999);
    $subject = "Восстановление пароля";
    $subject = "=?utf-8?B?".base64_encode($subject)."?=";
    $headers = "From: rkhorolskij@gmail.com\r\nReply-to: $email\r\nContent-type: text/html; charset=\"utf-8\"\r\n";
    $message = "Вы успешно восстановили пароль на сайте https://mytodotest.000webhostapp.com/MyToDo\nВаш новый пароль: ".$newPass;

    mail($email, $subject, $message, $headers);
    $_SESSION["success"] = "Вы успешно восстановили пароль! Мы отправили пароль вам на @mail.";

    $newPass = md5($newPass . "fh43gfh4");
    $mysql->query("UPDATE `register` SET `pass` = '$newPass' WHERE `register`.`email` = '$email'");
    $mysql->close();

    header("Location: /MyToDo/greeting/login.php");
  }
 ?>
