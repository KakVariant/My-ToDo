<?php
$title = "Вход в My ToDo";
include $_SERVER['DOCUMENT_ROOT'] . '/MyToDo/body/header.php';
session_start();

if (isset($_COOKIE["email"])) {
  header("Location: /MyToDo/action/todo.php");
}
?>
    <link rel="stylesheet" href="/MyToDo/style/form_style.css">
    <div class="container d-flex justify-content-center">
        <form action="/MyToDo/validation-form/auth.php" method="POST">
            <div class="form-group">
                <h2>Вход в My ToDo</h2>
            </div>
            <?PHP if (isset($_SESSION["err_inp"]))
            {
                echo "<div class=\"form-group alert alert-danger\" role=\"alert\">".$_SESSION["err_inp"]."</div>";
                unset($_SESSION["err_inp"]);
            }
            if (isset($_SESSION["success"])) {
              echo "<div class=\"form-group\">
              <div class=\"alert alert-success\" role=\"alert\">". $_SESSION["success"] ."</div></div>";
                unset($_SESSION["success"]);
            }
            ?>
            <div class="form-group">
              <label class="inp" for="exampleInputEmail1">Email</label>
              <input style="background-color: #e6e6e6; border-color: #35363b;" type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Введите свой @mail" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="inpPass">Password:</label>
                <input style="background-color: #e6e6e6; border-color: #35363b;" type="password" class="form-control" name="pass" id="inpPass" placeholder="Введите свой пароль">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg btn-block">Войти</button>
            </div>
            <div class="form-group">
                <a class="btn btn-outline-primary btn-lg btn-block" href="reg.php">Регистрация</a>
            </div>
            <div class="form-group">
                <?php
                $params = array(
                    'client_id'     => '364584403394-8f3op4c3f6r3idtfhdm9bfj7shsc595e.apps.googleusercontent.com',
                    'redirect_uri'  => 'https://mytodotest.000webhostapp.com/MyToDo/greeting/login_google.php',
                    'response_type' => 'code',
                    'scope'         => 'https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/userinfo.profile',
                    'state'         => '123'
                );

                /* Локалка:
                      http://localhost/MyToDo/greeting/login_google.php
                    ---------------------------------------------------------
                   Хостинг:
                      https://mytodotest.000webhostapp.com/MyToDo/greeting/login_google.php
                */

                $url = 'https://accounts.google.com/o/oauth2/auth?' . urldecode(http_build_query($params));
                echo '
                <a class="google_login btn btn-outline-primary btn-lg btn-block" href="' . $url . '">
                Авторизация через <i class="fa fa-google icon-btn-google" aria-hidden="true"></i><b>oogle</b>
                </a>
                ';
                ?>
            </div>
            <div class="form-group d-flex justify-content-end">
              <small class="form-text text-muted">Забыли пароль?<a href="/MyToDo/action/recovery.php" class="btn btn-link btn-sm">Восстановить</a></small>
            </div>
        </form>
    </div>
<br />
<br />
<?php

include $_SERVER['DOCUMENT_ROOT'] . '/MyToDo/body/footer.php';
?>
