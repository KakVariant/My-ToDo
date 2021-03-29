<?php
date_default_timezone_set('Europe/Kiev');
$sunrise = date_sunrise(time(), SUNFUNCS_RET_STRING, 50.45334610929983, 30.60373268410596, 90, 1);
$sunset = date_sunset(time(), SUNFUNCS_RET_STRING, 50.45334610929983, 30.60373268410596, 90, 1);

if ($sunrise < date("H:i")) {
setcookie("day", "day", time() + 3600 * 4, "/");
}
if ($sunset < date("H:i")) {
setcookie("day", "night", time() + 3600 * 4, "/");
}
 ?>
