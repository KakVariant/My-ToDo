<?php
setcookie("email", "", time() - 3600 * 4, "/");
setcookie("name", "", time() - 3600 * 4, "/");
setcookie("theme", "", time() - 3600 * 4, "/");
setcookie("date", "", time() - 3600 * 4, "/");
setcookie("day", "", time() - 3600 * 4, "/");
setcookie("date-sf", "", time() - 3600 * 4, "/");
setcookie("sort", "", time() - 3600 * 4, "/");
setcookie("group", "", time() - 3600 * 4, "/");
header("Location: /MyToDo/index.php");
?>
