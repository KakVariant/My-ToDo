<?php
session_start();
$title = "Смена пароля";
include $_SERVER['DOCUMENT_ROOT'] . '/MyToDo/body/header.php';
require $_SERVER['DOCUMENT_ROOT'] . '/MyToDo/theme/themeFunc.php';
 ?>

<link rel="stylesheet" href="/MyToDo/style/report.css">

<div class="rep container d-flex justify-content-center">
  <form action="change.php" method="post">
    <h1 class="heading d-flex justify-content-center">Смена пароля</h1>
    <br />
    <?php if (isset($_SESSION["success"])) {
      echo "<div class=\"form-group\">
      <div class=\"alert alert-success\" role=\"alert\">".$_SESSION["success"]."</div></div>";
      unset($_SESSION["success"]);
    }
    if (isset($_SESSION["errNewPass"])) {
      echo "<div class=\"form-group\">
      <div class=\"alert alert-danger\" role=\"alert\">".$_SESSION["errNewPass"]."</div></div>";
        unset($_SESSION["errNewPass"]);
    }
    if (isset($_SESSION["errNewPassLh"])) {
      echo "<div class=\"form-group\">
      <div class=\"alert alert-danger\" role=\"alert\">".$_SESSION["errNewPassLh"]."</div></div>";
        unset($_SESSION["errNewPassLh"]);
    }
     ?>
    <div class="form-group">
    <label for="exampleInputPassword1">Введите старый пароль</label>
    <input <?php echo "style=\"border-color: #35363b; ".colors()."\""; ?> autocomplete="off" name="oldPassword" type="password" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword2">Введите новый пароль</label>
    <input <?php echo "style=\"border-color: #35363b; ".colors()."\""; ?> autocomplete="off" name="newPassword" type="password" class="form-control" id="exampleInputPassword2">
  </div>
  <div class="form-group">
    <button type="submit" class="btn btn-primary btn-lg btn-block">Продолжить</button>
  </div>
  <div class="form-group d-flex justify-content-end">
    <small class="form-text text-muted">Забыли пароль?<a href="/MyToDo/action/recovery.php" class="btn btn-link btn-sm">Восстановить</a></small>
  </div>
  </form>
</div>

 <?php
 if (isset($_COOKIE["email"]) != 1) {
   setcookie("theme", "", time() - 3600 * 4, "/");
   header("Location: /MyToDo/index.php");
 }
 include $_SERVER['DOCUMENT_ROOT'] . '/MyToDo/body/footer.php';
  ?>
