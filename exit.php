<?php
setcookie("email", "", time() - 3600 * 4, "/");
setcookie("name", "", time() - 3600 * 4, "/");
setcookie("theme", "", time() - 3600 * 4, "/");
header("Location: /MyToDo/index.php");
?>
