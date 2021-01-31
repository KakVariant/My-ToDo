<?php
function colors()
{
  if (isset($_COOKIE["theme"])) {
    if ($_COOKIE["theme"] == 1)
    {
      return "background-color: #e6e6e6; color: black;";
    }
    if ($_COOKIE["theme"] == 2)
    {
      return "background-color: #292e33; color: #cccccc;";
    }
    if ($_COOKIE["theme"] == 3)
    {
      if (isset($_COOKIE["day"])) {
        if ($_COOKIE["day"] == "day") {
          return "background-color: #e6e6e6; color: black;";
        }
        if ($_COOKIE["day"] == "night") {
          return "background-color: #292e33; color: #cccccc;";
        }
      }
    }
    if ($_COOKIE["theme"] == 4)
    {
      return "background-color: white; color: black;";
    }
    if ($_COOKIE["theme"] == 5)
    {
      return "background-color: #fff5ea; color: black;";
    }
    if ($_COOKIE["theme"] == 6)
    {
      return "background-color: #FFEEBB; color: black;";
    }
    if ($_COOKIE["theme"] == 7)
    {
      return "background-color: #C5A880; color: black;";
    }
    if ($_COOKIE["theme"] == 8)
    {
      return "background-color: #D6D2C4; color: black;";
    }
    if ($_COOKIE["theme"] == 9)
    {
      return "background-color: #D6D2C4; color: black;";
    }
  }
}
 ?>
