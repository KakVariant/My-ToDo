<?php
    $email = $_COOKIE["email"];
    $name_group = $_POST["name_group"];

    if($name_group != "")
    {
        require $_SERVER['DOCUMENT_ROOT'] . '/MyToDo/db/dbconfig.php';
        $mysql->query("INSERT INTO `group_task` (`name`, `user_id`) VALUES ('$name_group', '$email')");
        $mysql->close();
    }
    header("Location: /MyToDo/action/group-task/group-task.php");
?>