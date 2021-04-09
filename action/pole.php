<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Поле чудес!</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/MyToDo/style/pole.css">
</head>
<body class="body">
<a href="/MyToDo/index.php" class="btn btn-outline-light exit-btn">X</a>
<div class="container-sm d-flex justify-content-center title-text">
    <div class="title-letter letter">П</div>
    <div class="title-letter letter">о</div>
    <div class="title-letter letter">л</div>
    <div class="title-letter letter">е</div>
    <div class="title-letter letter space"> </div>
    <div class="title-letter letter">ч</div>
    <div class="title-letter letter">у</div>
    <div class="title-letter letter">д</div>
    <div class="title-letter letter">е</div>
    <div class="title-letter letter">с</div>
</div>
<div class="d-flex justify-content-around container-body">
    <div class="container-sm d-flex justify-content-center">
        <canvas id="canvas" onclick="go()"></canvas>
    </div>
    <div class="container-sm d-flex flex-column justify-content-center">
        <div class="title d-flex">
            <div class="text-letter letter">Д</div>
            <div class="text-letter letter">о</div>
            <div class="text-letter letter">б</div>
            <div class="text-letter letter">а</div>
            <div class="text-letter letter">в</div>
            <div class="text-letter letter">и</div>
            <div class="text-letter letter">т</div>
            <div class="text-letter letter">ь</div>
            <div class="text-letter letter space"></div>
            <div class="text-letter letter">з</div>
            <div class="text-letter letter">а</div>
            <div class="text-letter letter">д</div>
            <div class="text-letter letter">а</div>
            <div class="text-letter letter">ч</div>
            <div class="text-letter letter">у</div>
        </div>
        <div class="content">
            <div class="custom-text">
                <div class="input-group mb-3">
                    <input autocomplete="off" maxlength="15" type="text" id="task" class="form-control" name="task" placeholder="Добавить новую задачу" aria-describedby="button-addon2">
                    <div class="input-group-append">
                        <a class="btn btn-secondary" data-toggle="modal" onclick="add()" name="add_medium" data-target="#exampleModal">Добавить</a>
                    </div>
                </div>
            </div>

            <div class="title d-flex res-title">
                <div class="text-letter letter">Р</div>
                <div class="text-letter letter">е</div>
                <div class="text-letter letter">з</div>
                <div class="text-letter letter">у</div>
                <div class="text-letter letter">л</div>
                <div class="text-letter letter">ь</div>
                <div class="text-letter letter">т</div>
                <div class="text-letter letter">а</div>
                <div class="text-letter letter">т</div>
                <div class="text-letter letter">:</div>
            </div>

            <div class="result d-flex justify-content-between">
                <div class="dummy-done">✓</div>
                <div class="result-text"><em id="result">Test</em></div>
                <div class="dummy-delete">X</div>
            </div>

            <div class="add-task">
                <button type="button" onclick="addTask()" class="btn btn-secondary btn-lg btn-block btn-add-task">Добавить задачу в MyToDo</button>
            </div>
        </div>
    </div>
    <img class="yakybovich" src="/MyToDo/img/yakybovich.png" alt="Крутите барабан!">
    <script src="/MyToDo/script/pole.js"></script>
</body>
</html>