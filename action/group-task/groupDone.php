<?php
require $_SERVER['DOCUMENT_ROOT'] . '/MyToDo/db/dbconfig.php';
$id = $_GET["id"];
$email = $_COOKIE["email"];

$mysql->query("UPDATE `register` SET `group_task` = '$id' WHERE `register`.`secure_key` = '$email'");
$mysql->close();
setcookie("group", $id, time() + 3600 * 4, "/");

header("Location: /MyToDo/index.php");
?>