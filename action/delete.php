<?php
$id = $_GET["id"];
$email = preg_replace('/@|\./','', $_COOKIE["email"]);

require $_SERVER['DOCUMENT_ROOT'] . '/MyToDo/db/dbconfig.php';

$mysql->query("DELETE FROM `$email` WHERE `$email`.`id` = $id");
$result = $mysql->query("SELECT * FROM `$email`");
$row = $result->fetch_assoc();
if (count($row) == 0) {
  $mysql->query("ALTER TABLE `$email` AUTO_INCREMENT = 1");
}
$mysql->close();
header("Location: /MyToDo/index.php");
?>
