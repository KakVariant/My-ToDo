<?php
if (isset($_POST["task"]) == 1)
{
    $email = preg_replace('/@|\./','', $_COOKIE["email"]);
    $task = $_POST["task"];

    if($task != "")
    {
      require $_SERVER['DOCUMENT_ROOT'] . '/MyToDo/db/dbconfig.php';
      $mysql->query("INSERT INTO `$email` (`task`, `activity`) VALUES ('$task', '0')");
      $mysql->close();
    }
    header("Location: /MyToDo/index.php");
}
?>
