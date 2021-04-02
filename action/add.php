<?php
if (isset($_POST["task"]) == 1)
{
    $email = $_COOKIE["email"];
    $task = $_POST["task"];
    $priority = 0;

    if (isset($_POST['add_low']))
    {
        $priority = 0;
    }

    if (isset($_POST['add_medium']))
    {
        $priority = 1;
    }

    if (isset($_POST['add_hard']))
    {
        $priority = 2;
    }

    if($task != "")
    {
      require $_SERVER['DOCUMENT_ROOT'] . '/MyToDo/db/dbconfig.php';
      $mysql->query("INSERT INTO `todo` (`task`, `activity`, `priority`, `user_id`) VALUES ('$task', '0', '$priority', '$email')");
      $mysql->close();
    }
    header("Location: /MyToDo/index.php");
}
?>
