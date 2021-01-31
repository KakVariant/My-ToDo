<?php
session_start();
require $_SERVER['DOCUMENT_ROOT'] . '/MyToDo/db/dbconfig.php';

$email = $_COOKIE["email"];
$oldPass = $_POST["oldPassword"];
$oldPass = md5($oldPass . "fh43gfh4");
$newPass = filter_var(trim($_POST["newPassword"]), FILTER_SANITIZE_STRING);

if (mb_strlen($newPass) < 4 || mb_strlen($newPass) > 15)
{
    $_SESSION["errNewPassLh"] = "Ошибка! Недопустимая длина пароля! (От 4 до 15)";
}
else
{
  $newPass = md5($newPass . "fh43gfh4");
  $result = $mysql->query("SELECT * FROM `register` WHERE `email` = '$email' AND `pass` = '$oldPass'");

  $user = $result->fetch_assoc();
  if (count($user) == 0)
  {
      $_SESSION["errNewPass"] = "Ошибка! Старый пароль введён не верно!";
  }
  else
  {
    $mysql->query("UPDATE `register` SET `pass` = '$newPass' WHERE `register`.`email` = '$email'");
    $_SESSION["success"] = "Пароль успешно изменён!";
  }
  $mysql->close();
}
header("Location: /MyToDo/action/changePass.php");
 ?>
