<?php
session_start();
$title = "Поддержка";
include $_SERVER['DOCUMENT_ROOT'] . '/MyToDo/body/header.php';
require $_SERVER['DOCUMENT_ROOT'] . '/MyToDo/theme/themeFunc.php';
 ?>
 <link rel="stylesheet" href="/MyToDo/style/report.css">

 <?php
 if (isset($_COOKIE["theme"])) {
   if ($_COOKIE["theme"] == 1)
   {
     echo "<link rel=\"stylesheet\" href=\"/MyToDo/style/theme/white.css\">";
   }
   if ($_COOKIE["theme"] == 2)
   {
     echo "<link rel=\"stylesheet\" href=\"/MyToDo/style/theme/dark.css\">";
   }
 }
  ?>
<div class="rep container d-flex justify-content-center">
  <form action="sendMail.php" method="post">
    <h1 class="heading d-flex justify-content-center">Тех. поддержка</h1>
    <br />
    <?php if (isset($_SESSION["rep"])) {
      echo "<div class=\"form-group\">
      <div class=\"alert alert-success\" role=\"alert\">".$_SESSION["rep"]."</div></div>";
      unset($_SESSION["rep"]);
    } ?>
    <div class="form-group">
      <label class="inp" for="exampleFormControlTextarea1">Опишите ситуацию</label>
      <textarea  autocomplete="off" <?php echo "style=\"border-color: #35363b; ".colors()."\""; ?> class="form-control" name="question" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-primary col-12">Отправить</button>
  </form>
</form>
</div>

 <?php
include $_SERVER['DOCUMENT_ROOT'] . '/MyToDo/body/footer.php';
  ?>
