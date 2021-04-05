<?php
require $_SERVER['DOCUMENT_ROOT'] . '/MyToDo/db/dbconfig.php';
$id = $_GET["id"];
$email = $_COOKIE["email"];

if (isset($_COOKIE["group"]))
{
    if ($_COOKIE["group"] == $id)
    {
        setcookie("group", "", time() - 3600 * 4, "/");

        $mysql->query("UPDATE `register` SET `group_task` = 0 WHERE `register`.`secure_key` = '$email'");
    }
}

$mysql->query("DELETE FROM `group_task` WHERE `group_task`.`id` = $id");
$result = $mysql->query("SELECT * FROM `group_task`");
$row = $result->fetch_assoc();
if (count($row) == 0) {
    $mysql->query("ALTER TABLE `group_task` AUTO_INCREMENT = 1");
}

require $_SERVER['DOCUMENT_ROOT'] . '/MyToDo/db/dbconfig.php';

$email = $_COOKIE["email"];

$mysql->query("DELETE FROM todo WHERE group_id = $id");

$mysql->close();

header("Location: /MyToDo/action/group-task/group-task.php");
?>