<?php
$id = (int)$_POST["ok"];
$title = $_POST["title"];
$description = $_POST["description"];


require $_SERVER['DOCUMENT_ROOT'] . '/MyToDo/db/dbconfig.php';

$result = $mysql->query("SELECT * FROM `diary` WHERE `id` = '$id'");
$row = $result->fetch_assoc();
$mysql->query("UPDATE `diary` SET `title` =  '$title', `description` = '$description' WHERE `diary`.`id` = '$id'");
$mysql->close();

header("Location: /MyToDo/action/diary.php");
?>