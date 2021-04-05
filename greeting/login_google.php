<?php
require $_SERVER['DOCUMENT_ROOT'] . '/MyToDo/timeOrient.php';

if (!empty($_GET['code'])) {
    // Отправляем код для получения токена (POST-запрос).
    $params = array(
        'client_id'     => '364584403394-8f3op4c3f6r3idtfhdm9bfj7shsc595e.apps.googleusercontent.com',
        'client_secret' => 'dGmTgop546-QIXrclBpw020x',
        'redirect_uri'  => 'http://localhost/MyToDo/greeting/login_google.php',
        'grant_type'    => 'authorization_code',
        'code'          => $_GET['code']
    );

                /* Локалка:
                      http://localhost/MyToDo/greeting/login_google.php
                    ---------------------------------------------------------
                   Хостинг:
                      https://mytodotest.000webhostapp.com/MyToDo/greeting/login_google.php
                */

    $ch = curl_init('https://accounts.google.com/o/oauth2/token');
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HEADER, false);
    $data = curl_exec($ch);
    curl_close($ch);

    $data = json_decode($data, true);
    if (!empty($data['access_token'])) {
        // Токен получили, получаем данные пользователя.
        $params = array(
            'access_token' => $data['access_token'],
            'id_token'     => $data['id_token'],
            'token_type'   => 'Bearer',
            'expires_in'   => 3599
        );

        $info = file_get_contents('https://www.googleapis.com/oauth2/v1/userinfo?' . urldecode(http_build_query($params)));
        $info = json_decode($info, true);

        $emailDefault = $info["email"];
        $email = md5(strtolower($info["email"])."gvmbvjmj");
        $name = $info["name"];

        require $_SERVER['DOCUMENT_ROOT'] . '/MyToDo/db/dbconfig.php';
        $result = $mysql->query("SELECT * FROM `register` WHERE `secure_key` = '$email'");
        $mysql->close();
        $user = $result->fetch_assoc();
        if (count($user) != 0)
        {
            $id = $user["group_task"];
            require $_SERVER['DOCUMENT_ROOT'] . '/MyToDo/db/dbconfig.php';
            $result = $mysql->query("SELECT * FROM `group_task` WHERE `id` = '$id'");
            $gr_id = $result->fetch_assoc();

            setcookie("name_group", $gr_id["name"], time() + 3600 * 4, "/");

            setcookie("group", $id, time() + 3600 * 4, "/");
            setcookie("email", $email, time() + 3600 * 4, "/");
            setcookie("email", $email, time() + 3600 * 4, "/");
            setcookie("sort", "all", time() + 3600 * 4, "/");
            date_default_timezone_set('Europe/Kiev');
            setcookie("date", date('d.m.Y'), time() + 3600 * 4, "/");
            setcookie("date-sf", date("Y-m-d"), time() + 3600 * 4, "/");
            $mysql->close();
            header("Location: /MyToDo/index.php");
            exit();
        }
        require $_SERVER['DOCUMENT_ROOT'] . '/MyToDo/db/dbconfig.php';
        $mysql->query("INSERT INTO `register`(`secure_key`, `email`, `name`, `pass`, `theme`, `group_task`) VALUES('$email', '$emailDefault', '$name', '', 1, 0)");
        $mysql->close();
        setcookie("name_group", "0", time() + 3600 * 4, "/");
        setcookie("email", $email, time() + 3600 * 4, "/");
        setcookie("name", $name, time() + 3600 * 4, "/");
        setcookie("sort", "all", time() + 3600 * 4, "/");
        date_default_timezone_set('Europe/Kiev');
        setcookie("date", date('d.m.Y'), time() + 3600 * 4, "/");
        setcookie("date-sf", date("Y-m-d"), time() + 3600 * 4, "/");
        header("Location: /MyToDo/index.php");

    }
}
?>