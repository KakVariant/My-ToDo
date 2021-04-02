<?php
session_start();
require $_SERVER['DOCUMENT_ROOT'] . '/MyToDo/timeOrient.php';
$email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_STRING);
$name = filter_var(trim($_POST["name"]), FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST["pass"]), FILTER_SANITIZE_STRING);

$email = strtolower($email);

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

$result = $mysql->query("SELECT * FROM `register` WHERE `email` = '$email'");
$user = $result->fetch_assoc();
if (count($user) == 0) {
    $pass = md5($pass . "fh43gfh4");

    $emailName = preg_replace('/@|\./','',$email);
    $emailAndDiary = $emailName . "diary";

    $mysql->query("INSERT INTO `register`(`email`, `name`, `pass`, `theme`) VALUES('$email', '$name', '$pass', 1)");
    $mysql->query("CREATE TABLE $emailName (id INT NOT NULL Primary key AUTO_INCREMENT, task VARCHAR(50) NOT NULL, activity BOOLEAN NOT NULL, priority INT NOT NULL)");
    $mysql->query("CREATE TABLE $emailAndDiary (id INT NOT NULL Primary key AUTO_INCREMENT, title VARCHAR(50) NOT NULL, description VARCHAR(300) NOT NULL, date VARCHAR(50) NOT NULL, time VARCHAR(50) NOT NULL, activity BOOLEAN NOT NULL)");
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
