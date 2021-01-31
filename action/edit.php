<?php
require $_SERVER['DOCUMENT_ROOT'] . '/MyToDo/db/dbconfig.php';
$id = $_GET["id"];
$email = preg_replace('/@|\./','', $_COOKIE["email"]);

$result = $mysql->query("SELECT * FROM `$email` WHERE `id` = '$id'");
$row = $result->fetch_assoc();
if ($row["activity"] == 1) {
  $mysql->query("UPDATE `$email` SET `activity` = '0' WHERE `$email`.`id` = '$id'");
}
else {
  $mysql->query("UPDATE `$email` SET `activity` = '1' WHERE `$email`.`id` = '$id'");
}
$mysql->close();

header("Location: /MyToDo/index.php");
 ?>
