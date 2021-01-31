<?php
session_start();
$title = "Восстановление пароля";
include $_SERVER['DOCUMENT_ROOT'] . '/MyToDo/body/header.php';
require $_SERVER['DOCUMENT_ROOT'] . '/MyToDo/theme/themeFunc.php';

setcookie("email", "", time() - 3600 * 4, "/");
setcookie("name", "", time() - 3600 * 4, "/");
setcookie("theme", "", time() - 3600 * 4, "/");
 ?>

 <link rel="stylesheet" href="/MyToDo/style/report.css">

<div class="rep container d-flex justify-content-center">
  <form action="recoveryPass.php" method="post">
    <h1 class="heading d-flex justify-content-center">Восстановление пароля</h1>
    <br />
    <?php
    if (isset($_SESSION["err"])) {
      echo "<div class=\"form-group\">
      <div class=\"alert alert-danger\" role=\"alert\">".$_SESSION["err"]."</div></div>";
      unset($_SESSION["err"]);
    }
     ?>
  <div class="form-group">
    <label for="email">Введите @mail</label>
    <input <?php echo "style=\"border-color: #35363b; ".colors()."\""; ?> placeholder="@mail" name="email" type="email" class="form-control" id="email">
  </div>
  <div class="form-group">
    <button type="submit" class="btn btn-primary">Продолжить</button>
  </div>
  </form>
</div>

 <?php
 include $_SERVER['DOCUMENT_ROOT'] . '/MyToDo/body/footer.php';
  ?>
