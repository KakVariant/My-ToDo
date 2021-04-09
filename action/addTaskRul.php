<?php
$email = $_COOKIE["email"];
$task = $_COOKIE["task-rul"];
$priority = 2;
$group_id = $_COOKIE["group"];

if($task != "")
{
    require $_SERVER['DOCUMENT_ROOT'] . '/MyToDo/db/dbconfig.php';
    $mysql->query("INSERT INTO `todo` (`task`, `activity`, `priority`, `user_id`, `group_id`) VALUES ('$task', '0', '$priority', '$email', '$group_id')");
    $mysql->close();
}
setcookie("task-rul", "", time() - 3600 * 4, "/");
header("Location: /MyToDo/index.php");
?>