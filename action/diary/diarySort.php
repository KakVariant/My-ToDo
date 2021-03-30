<?php
if (!strcmp($_POST["select-sort"], "all"))
{
    setcookie("sort", "all", time() + 3600 * 4, "/");
}
if (!strcmp($_POST["select-sort"], "mark"))
{
    setcookie("sort", "mark", time() + 3600 * 4, "/");
}
if (!strcmp($_POST["select-sort"], "day"))
{
    setcookie("sort", "day", time() + 3600 * 4, "/");
    $arr = explode("-", $_POST["inpDate"]);
    $date = $arr[2].".".$arr[1].".".$arr[0];
    setcookie("date", $date, time() + 3600 * 4, "/");
    setcookie("date-sf", $_POST["inpDate"], time() + 3600 * 4, "/");
}
header("Location: /MyToDo/action/diary.php");
?>