<?php
$id = $_GET["id"];

require $_SERVER['DOCUMENT_ROOT'] . '/MyToDo/db/dbconfig.php';

$mysql->query("DELETE FROM `diary` WHERE `diary`.`id` = $id");
$result = $mysql->query("SELECT * FROM `diary`");
$row = $result->fetch_assoc();
if (count($row) == 0) {
    $mysql->query("ALTER TABLE `diary` AUTO_INCREMENT = 1");
}
$mysql->close();
header("Location: /MyToDo/action/diary.php");
?>