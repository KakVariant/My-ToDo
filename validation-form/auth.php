<?php
session_start();
require $_SERVER['DOCUMENT_ROOT'] . '/MyToDo/timeOrient.php';
$email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST["pass"]), FILTER_SANITIZE_STRING);

$email = md5(strtolower($email)."gvmbvjmj");

$pass = md5($pass."fh43gfh4");

require $_SERVER['DOCUMENT_ROOT'] . '/MyToDo/db/dbconfig.php';

$result = $mysql->query("SELECT * FROM `register` WHERE `secure_key` = '$email' AND `pass` = '$pass'");
$mysql->close();
$user = $result->fetch_assoc();
if (count($user) == 0)
{
    $_SESSION["err_inp"] = "Логин или пароль введён не верно!";
    header("Location: /MyToDo/greeting/login.php");
    exit();
}

$id = $user["group_task"];
require $_SERVER['DOCUMENT_ROOT'] . '/MyToDo/db/dbconfig.php';
$result = $mysql->query("SELECT * FROM `group_task` WHERE `id` = '$id'");
$mysql->close();
$gr_id = $result->fetch_assoc();

setcookie("name_group", $gr_id["name"], time() + 3600 * 4, "/");

setcookie("group", $id, time() + 3600 * 4, "/");
setcookie("email", $email, time() + 3600 * 4, "/");
setcookie("sort", "all", time() + 3600 * 4, "/");
date_default_timezone_set('Europe/Kiev');
setcookie("date", date('d.m.Y'), time() + 3600 * 4, "/");
setcookie("date-sf", date("Y-m-d"), time() + 3600 * 4, "/");
if ($id == 0)
{
    header("Location: /MyToDo/action/group-task/group-task.php");
    exit();
}
header("Location: /MyToDo/index.php");
?>
