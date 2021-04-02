<?php
require $_SERVER['DOCUMENT_ROOT'] . '/MyToDo/db/dbconfig.php';
$id = $_GET["id"];

$result = $mysql->query("SELECT * FROM `diary` WHERE `id` = '$id'");
$row = $result->fetch_assoc();
if ($row["activity"] == 1) {
    $mysql->query("UPDATE `diary` SET `activity` = '0' WHERE `diary`.`id` = '$id'");
}
else {
    $mysql->query("UPDATE `diary` SET `activity` = '1' WHERE `diary`.`id` = '$id'");
}
$mysql->close();

header("Location: /MyToDo/action/diary.php");
?>