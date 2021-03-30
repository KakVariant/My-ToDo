<?php
$id = (int)$_POST["ok"];
$title = $_POST["title"];
$description = $_POST["description"];


require $_SERVER['DOCUMENT_ROOT'] . '/MyToDo/db/dbconfig.php';
$email = preg_replace('/@|\./','', $_COOKIE["email"])."diary";

$result = $mysql->query("SELECT * FROM `$email` WHERE `id` = '$id'");
$row = $result->fetch_assoc();
$mysql->query("UPDATE `$email` SET `title` =  '$title', `description` = '$description' WHERE `$email`.`id` = '$id'");
$mysql->close();

header("Location: /MyToDo/action/diary.php");
?>