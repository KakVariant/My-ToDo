<?php
session_start();
require $_SERVER['DOCUMENT_ROOT'] . '/MyToDo/timeOrient.php';
$email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_STRING);
$name = filter_var(trim($_POST["name"]), FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST["pass"]), FILTER_SANITIZE_STRING);

$emailDefault = strtolower($email);

if (!filter_var($email, FILTER_VALIDATE_EMAIL))
{
    $_SESSION["errEmailLh"] = "Ошибка! Недопустимая длина почты!";
    header("Location: /MyToDo/greeting/reg.php");
    exit();
}elseif (mb_strlen($name) < 3 || mb_strlen($name) > 15)
{
    $_SESSION["errNameLh"] = "Ошибка! Недопустимая длина имени! (От 3 до 15)";
    header("Location: /MyToDo/greeting/reg.php");
    exit();
}elseif (mb_strlen($pass) < 4 || mb_strlen($pass) > 15)
{
    $_SESSION["errPassLh"] = "Ошибка! Недопустимая длина пароля! (От 4 до 15)";
    header("Location: /MyToDo/greeting/reg.php");
    exit();
}

require $_SERVER['DOCUMENT_ROOT'] . '/MyToDo/db/dbconfig.php';

$email = md5(strtolower($emailDefault)."gvmbvjmj");
$result = $mysql->query("SELECT * FROM `register` WHERE `secure_key` = '$email'");
$user = $result->fetch_assoc();
if (count($user) == 0) {
    $pass = md5($pass . "fh43gfh4");

    $mysql->query("INSERT INTO `register`(`secure_key`, `email`, `name`, `pass`, `theme`) VALUES('$email', '$emailDefault', '$name', '$pass', 1)");
    $mysql->close();

    setcookie("email", $email, time() + 3600 * 4, "/");
    setcookie("name", $name, time() + 3600 * 4, "/");
    setcookie("sort", "all", time() + 3600 * 4, "/");
    date_default_timezone_set('Europe/Kiev');
    setcookie("date", date('d.m.Y'), time() + 3600 * 4, "/");
    setcookie("date-sf", date("Y-m-d"), time() + 3600 * 4, "/");
    header("Location: /MyToDo/index.php");
}
else
{
    $mysql->close();
    $_SESSION["errEmailExists"] = "Ошибка! Такой пользователь уже существует!";
    header("Location: /MyToDo/greeting/reg.php");
    exit();
}
?>
