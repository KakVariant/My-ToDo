<?php
$email = $_COOKIE["email"];
$theme = $_GET["theme"];

require $_SERVER['DOCUMENT_ROOT'] . '/MyToDo/db/dbconfig.php';
$mysql->query("UPDATE `register` SET `theme` = '$theme' WHERE `register`.`secure_key` = '$email'");
$mysql->close();
setcookie("theme", $theme, time() + 3600 * 4, "/");

header("Location: /MyToDo/theme/theme.php");
 ?>
