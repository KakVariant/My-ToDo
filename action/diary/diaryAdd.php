<?php
if (isset($_POST["title"]) == 1)
{
    $email = $_COOKIE["email"];
    date_default_timezone_set('Europe/Kiev');

    $title = $_POST["title"];
    $description = $_POST["description"];
    $date = date('d.m.Y');
    $time = date("H:i");

    if($title != "")
    {
        require $_SERVER['DOCUMENT_ROOT'] . '/MyToDo/db/dbconfig.php';
        $mysql->query("INSERT INTO `diary` (`title`, `description`, `date`, `time`, `activity`, `user_id`) VALUES ('$title', '$description', '$date', '$time', '0', '$email')");
        $mysql->close();
    }
    header("Location: /MyToDo/action/diary.php");
}
?>