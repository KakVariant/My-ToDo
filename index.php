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
    if (!isset($_COOKIE["group"]))
    {
        if ($thm["group_task"] != 0)
        {
            setcookie("group", $thm["group_task"], time() + 3600 * 4, "/");
        }
    }
    header("Location: action/todo.php");
}
else
{
    header("Location: greeting/login.php");
}
?>
