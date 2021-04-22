<?php
$title = "Настройки";
include $_SERVER['DOCUMENT_ROOT'] . '/MyToDo/body/header.php';
require $_SERVER['DOCUMENT_ROOT'] . '/MyToDo/theme/themeFunc.php';
?>

<link rel="stylesheet" href="/MyToDo/style/neomorf-light-mode.css">

<div class="container container-md d-flex flex-column justify-content-center align-items-center">
    <h2 class="title">Настройки пользователя</h2>
    <div class="container-md d-flex flex-wrap justify-content-around align-items-center">
        <div class="settings-account d-flex flex-column justify-content-center align-items-center">
            <h4 class="sub-title">Настройки аккаунта</h4>
            <div class="group-card d-flex justify-content-around align-items-center">
                <div class="card card_avatar">
                    <h6 class="name_card">Аватар</h6>
                    <i class="fa fa-user avatar icon" aria-hidden="true"></i>
                    <!-- <img src="icon/avatar.png" alt="avatar" class="avatar"> -->
                    <a href="/MyToDo/action/changeAvatar.php" class="btn-custom">Изменить</a>
                </div>
                <div class="card card_pass">
                    <h6 class="name_card">Пароль</h6>
                    <i class="fa fa-key icon" aria-hidden="true"></i>
                    <a href="/MyToDo/action/changePass.php" class="btn-custom">Изменить</a>
                </div>
            </div>
        </div>
        <div class="discrict"></div>
        <div class="custom d-flex flex-column justify-content-center align-items-center">
            <h4 class="sub-title">Кастомизация</h4>
            <div class="group-card d-flex flex-column justify-content-center align-items-center">
                <div class="card">
                    <h6 class="name_card">Текущая тема</h6>
                    <img src="/MyToDo/theme-icon/sunr.jpg" class="icon icon-thm">
                    <a href="/MyToDo/theme/theme.php" class="btn-custom">Изменить</a>
                </div>
            </div>
        </div>
        <div class="discrict"></div>
        <div class="support d-flex flex-column justify-content-center align-items-center">
            <h4 class="sub-title">Тех. раздел</h4>
            <div class="group-card d-flex flex-column justify-content-center align-items-center">
                <div class="card">
                    <h6 class="name_card">Тех. поддержка</h6>
                    <i class="fa fa-envelope icon" aria-hidden="true"></i>
                    <a href="/MyToDo/report/report.php" class="btn-custom">Написать</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/MyToDo/body/footer.php';
?>
