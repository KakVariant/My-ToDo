<?php
if (isset($_POST["title"]) == 1)
{
    $email = preg_replace('/@|\./','', $_COOKIE["email"])."diary";
    date_default_timezone_set('Europe/Kiev');

    $title = $_POST["title"];
    $description = $_POST["description"];
    $date = date("m.d.y");
    $time = date("H:i");

    if($title != "")
    {
        require $_SERVER['DOCUMENT_ROOT'] . '/MyToDo/db/dbconfig.php';
        $mysql->query("INSERT INTO `$email` (`title`, `description`, `date`, `time`, `activity`) VALUES ('$title', '$description', '$date', '$time', '0')");
        $mysql->close();
    }
    header("Location: /MyToDo/action/diary.php");
}
?>