<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

    <?php
    if (isset($_COOKIE["theme"]))
    {
      if ($_COOKIE["theme"] == 1)
      {
        echo "<link rel=\"stylesheet\" href=\"/MyToDo/style/theme/white.css\">";
      }
      if ($_COOKIE["theme"] == 2)
      {
        echo "<link rel=\"stylesheet\" href=\"/MyToDo/style/theme/dark.css\">";
      }
      if ($_COOKIE["theme"] == 3)
      {
        if (isset($_COOKIE["day"])) {
          if ($_COOKIE["day"] == "day") {
          echo "<link rel=\"stylesheet\" href=\"/MyToDo/style/theme/white.css\">";
          }
          if ($_COOKIE["day"] == "night") {
          echo "<link rel=\"stylesheet\" href=\"/MyToDo/style/theme/dark.css\">";
          }
        }
        else {
          echo "<link rel=\"stylesheet\" href=\"/MyToDo/style/theme/white.css\">";
        }
      }
      if ($_COOKIE["theme"] == 4)
      {
        echo "<link rel=\"stylesheet\" href=\"/MyToDo/style/theme/white.css\">";
      }
      if ($_COOKIE["theme"] == 5)
      {
        echo "<link rel=\"stylesheet\" href=\"/MyToDo/style/theme/pink.css\">";
      }
      if ($_COOKIE["theme"] == 6)
      {
        echo "<link rel=\"stylesheet\" href=\"/MyToDo/style/theme/yellow.css\">";
      }
      if ($_COOKIE["theme"] == 7)
      {
        echo "<link rel=\"stylesheet\" href=\"/MyToDo/style/theme/brown.css\">";
      }
      if ($_COOKIE["theme"] == 8)
      {
        echo "<link rel=\"stylesheet\" href=\"/MyToDo/style/theme/brown-gray.css\">";
      }
      if ($_COOKIE["theme"] == 9)
      {
        echo "<link rel=\"stylesheet\" href=\"/MyToDo/style/theme/brow-wintage.css\">";
      }
    }

    if (!isset($_COOKIE["theme"]))
    {
      echo "<link rel=\"stylesheet\" href=\"/MyToDo/style/theme/white.css\">";
    }
     ?>

</head>
<body>
<br />
<br />
  <nav class="navbar fixed-top navbar-expand-md bg-dark navbar-dark">
    <a class="navbar-brand" href="/MyToDo/index.php">My ToDo</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav">
        <?php if($_SERVER['REQUEST_URI'] != "/MyToDo/greeting/login.php" && $_SERVER['REQUEST_URI'] != "/MyToDo/greeting/reg.php"  && $_SERVER['REQUEST_URI'] != "/MyToDo/theme/theme.php" && $_SERVER['REQUEST_URI'] != "/MyToDo/action/recovery.php")
        {
          echo "
          <li class=\"nav-item\">
          <a href=\"/MyToDo/theme/theme.php\" class=\"nav-link\">Выбор темы</a>
          </li>
          ";
        }
        if($_SERVER['REQUEST_URI'] != "/MyToDo/action/changePass.php" && $_SERVER['REQUEST_URI'] != "/MyToDo/greeting/login.php" && $_SERVER['REQUEST_URI'] != "/MyToDo/greeting/reg.php" && $_SERVER['REQUEST_URI'] != "/MyToDo/action/recovery.php")
        {
          echo "
          <li class=\"nav-item\">
          <a href=\"/MyToDo/action/changePass.php\" class=\"nav-link\">Сменить пароль</a>
          </li>
          ";
        }
          if($_SERVER['REQUEST_URI'] != "/MyToDo/report/report.php" && $_SERVER['REQUEST_URI'] != "/MyToDo/greeting/login.php" && $_SERVER['REQUEST_URI'] != "/MyToDo/greeting/reg.php" && $_SERVER['REQUEST_URI'] != "/MyToDo/action/recovery.php")
          {
            echo "
            <li class=\"nav-item\">
            <a href=\"/MyToDo/report/report.php\" class=\"nav-link\">Поддержка</a>
            </li>
            ";
          }
          if($_SERVER['REQUEST_URI'] != "/MyToDo/greeting/login.php" && $_SERVER['REQUEST_URI'] != "/MyToDo/greeting/reg.php" && $_SERVER['REQUEST_URI'] != "/MyToDo/action/recovery.php")
          {
            echo "
            <li class=\"nav-item\">
            <a href=\"/MyToDo/exit.php\" class=\"nav-link\">Выйти</a>
            </li>
            ";
          }
          ?>
      </ul>
    </div>
  </nav>
  <br>
