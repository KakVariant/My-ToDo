<?php
require $_SERVER['DOCUMENT_ROOT'] . '/MyToDo/db/dbconfig.php';
$id = $_GET["id"];

$result = $mysql->query("SELECT * FROM `todo` WHERE `id` = '$id'");
$row = $result->fetch_assoc();
if ($row["activity"] == 1) {
  $mysql->query("UPDATE `todo` SET `activity` = '0' WHERE `todo`.`id` = '$id'");
}
else {
  $mysql->query("UPDATE `todo` SET `activity` = '1' WHERE `todo`.`id` = '$id'");
}
$mysql->close();

header("Location: /MyToDo/index.php");
 ?>
