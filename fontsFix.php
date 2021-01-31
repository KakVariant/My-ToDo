<?php
function fontsFix ($row, $active)
{
  if ($active == 1) {
    if (strlen($row) <= 10) {
      return "font-size: 18px;";
    }
    if (strlen($row) > 10 and strlen($row) <= 20) {
      return "font-size: 16px;";
    }
    if (strlen($row) > 20) {
      return "font-size: 14px;";
    }
  }
  if ($active == 0) {
    if (strlen($row) <= 10) {
      return "font-size: 18px;";
    }
    if (strlen($row) > 10 and strlen($row) <= 20) {
      return "font-size: 16px;";
    }
    if (strlen($row) > 20) {
      return "font-size: 14px;";
    }
  }
}
 ?>
