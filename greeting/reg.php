<?php
session_start();
$title = "Регистрация My ToDo";
include $_SERVER['DOCUMENT_ROOT'] . '/MyToDo/body/header.php';
?>
    <link rel="stylesheet" href="/MyToDo/style/form_style.css">
    <div class="container d-flex justify-content-center">
        <form action="/MyToDo/validation-form/check.php" method="POST">
            <div class="form-group">
                <h2>Регистрация в My ToDo</h2>
            </div>
            <?php
            if (isset($_SESSION["errEmailLh"])) {
                echo "<div class=\"alert alert-danger\" role=\"alert\">".$_SESSION["errEmailLh"]."</div>";
                unset($_SESSION["errEmailLh"]);
            }
            if (isset($_SESSION["errEmailExists"])) {
                echo "<div class=\"alert alert-danger\" role=\"alert\">".$_SESSION["errEmailExists"]."</div>";
                unset($_SESSION["errEmailExists"]);
            }
             ?>
            <div class="form-group">
              <label class="inp" for="exampleInputEmail1">Email</label>
              <input style="background-color: #e6e6e6; border-color: #35363b;" type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Введите свой @mail" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="inpName">Name:</label>
                <input style="background-color: #e6e6e6; border-color: #35363b;" type="text" class="form-control" name="name" id="inpName" placeholder="Как Вас зовут?">
                <?PHP if (isset($_SESSION["errNameLh"])) {
                    echo "<br /><div class=\"alert alert-danger\" role=\"alert\">".$_SESSION["errNameLh"]."</div>";
                    unset($_SESSION["errNameLh"]);
                }
                ?>
            </div>
            <div class="form-group">
                <label for="inpPass">Password:</label>
                <input style="background-color: #e6e6e6; border-color: #35363b;" type="password" class="form-control" name="pass" id="inpPass" placeholder="Введите свой пароль">
                <?PHP if (isset($_SESSION["errPassLh"])) {
                    echo "<br /><div class=\"alert alert-danger\" role=\"alert\">".$_SESSION["errPassLh"]."</div>";
                    unset($_SESSION["errPassLh"]);
                }
                ?>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg btn-block">Регистрация</button>
            </div>
        </form>
    </div>
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/MyToDo/body/footer.php';
?>
