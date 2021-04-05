<?php
require $_SERVER['DOCUMENT_ROOT'] . '/MyToDo/db/dbconfig.php';

if(isset($_COOKIE["email"]))
{
    $email = $_COOKIE["email"];
    $result = $mysql->query("SELECT * FROM `register` WHERE `secure_key` = '$email'");
    $mysql->close();
    $thm = $result->fetch_assoc();
    setcookie("name", $thm["name"], time() + 3600 * 4, "/");
    setcookie("theme", $thm["theme"], time() + 3600 * 4, "/");
    $id = $thm["group_task"];
    if (isset($_COOKIE["group"]) == 0 || $id == 0)
    {
        header("Location: /MyToDo/action/group-task/group-task.php");
        exit();
    }
    header("Location: action/todo.php");
}
else
{
    header("Location: greeting/login.php");
}
?>
