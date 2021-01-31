<?php
$title = "Выбор темы";
include $_SERVER['DOCUMENT_ROOT'] . '/MyToDo/body/header.php';

function done($thems)
{
  if ($_COOKIE["theme"] == $thems) {
    echo "done";
  }
  else {
    echo "theme";
  }
}
?>
<link rel="stylesheet" href="/MyToDo/style/theme.css" type="text/css">
<h1 class="heading d-flex justify-content-center">Выбор темы</h1>
<div class="container row">
  <div class="<?php done(1) ?>">
    <div><a href="theme-apply.php?theme=1"><img class="theme-img" src="/MyToDo/theme-icon/white.jpg" alt="white"></a></div>
  </div>
  <div class="<?php done(2) ?>">
    <div><a href="theme-apply.php?theme=2"><img class="theme-img" src="/MyToDo/theme-icon/dark.jpg" alt="dark"></a></div>
  </div>
  <div class="<?php done(3) ?>">
    <div><a href="theme-apply.php?theme=3"><img class="theme-img" src="/MyToDo/theme-icon/sunr.jpg" alt="sunr"></a></div>
  </div>
  <div class="<?php done(4) ?>">
    <div><a href="theme-apply.php?theme=4"><img class="theme-img" src="/MyToDo/theme-icon/full-white.jpg" alt="full-white"></a></div>
  </div>
  <div class="<?php done(5) ?>">
    <div><a href="theme-apply.php?theme=5"><img class="theme-img" src="/MyToDo/theme-icon/pink.jpg" alt="pink"></a></div>
  </div>
  <div class="<?php done(6) ?>">
    <div><a href="theme-apply.php?theme=6"><img class="theme-img" src="/MyToDo/theme-icon/yellow.jpg" alt="yellow"></a></div>
  </div>
  <div class="<?php done(7) ?>">
    <div><a href="theme-apply.php?theme=7"><img class="theme-img" src="/MyToDo/theme-icon/brown.jpg" alt="brown"></a></div>
  </div>
  <div class="<?php done(8) ?>">
    <div><a href="theme-apply.php?theme=8"><img class="theme-img" src="/MyToDo/theme-icon/brown-gray.jpg" alt="brown-gray"></a></div>
  </div>
  <div class="<?php done(9) ?>">
    <div><a href="theme-apply.php?theme=9"><img class="theme-img" src="/MyToDo/theme-icon/brow-wintage.jpg" alt="brow-wintage"></a></div>
  </div>
</div>
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/MyToDo/body/footer.php';
?>
