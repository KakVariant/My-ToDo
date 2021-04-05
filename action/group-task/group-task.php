<?php
$title = "Группы заданий";
include $_SERVER['DOCUMENT_ROOT'] . '/MyToDo/body/header.php';
require $_SERVER['DOCUMENT_ROOT'] . '/MyToDo/theme/themeFunc.php';
require $_SERVER['DOCUMENT_ROOT'] . '/MyToDo/fontsFix.php';
?>
<link rel="stylesheet" href="/MyToDo/style/group-task.css">

<?php

// Вывод всех записей за определённый день

function showGroup($result)
{
    $style = "style=\"" . colors() . "\"";

    while (($row = $result->fetch_assoc()) != false)
    {
        $class = "";
        if (isset($_COOKIE["group"]))
        {
            if ($_COOKIE["group"] == $row["id"]) {
                $class = "done";
            } else {
                $class = "";
            }
        }

            echo "<div class=\"card-group\">
        <div class=\"name-group ".$class."\"".$style.">
            <em style=\"" . fontsFix($row["name"], 1) . "\">".$row["name"]."</em>
            </div>
            <div class=\"back ".$class."\"".$style.">
                <a href=\"/MyToDo/action/group-task/groupDone.php?id=".$row["id"]."\" class=\"btn btn-outline-primary select-btn\">Выбрать</a>
                <a data-toggle=\"modal\" data-target=\"#exampleModalDell\" data-whatever=\"/MyToDo/action/group-task/groupDelete.php?id=".$row["id"]."\" class=\"btn btn-outline-danger del-btn\">Удалить</a>
            </div>
            </div>";
    }
}



// Функция для запроса в БД
function query()
{
    require $_SERVER['DOCUMENT_ROOT'] . '/MyToDo/db/dbconfig.php';

    $email = $_COOKIE["email"];

    $result = $mysql->query("SELECT * FROM `group_task` WHERE `user_id` = '$email'  ORDER BY `group_task`.`id`");
    $mysql->close();
    return $result;
}
?>

    <h1 class="heading"><em>Группы заданий</em></h1>

<div class="container d-flex justify-content-center flex-wrap">
    <?php
    showGroup(query());
    ?>

    <a class="card-group" data-toggle="modal" data-target="#exampleModal">
        <div class="add-group" <?php echo "style=\"".colors()."\""; ?>>
            <i class="fa fa-plus-square add-icon" aria-hidden="true"></i>
        </div>
    </a>
</div>





<!--Модальное окно для создания группы-->

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" <?php echo "style=\"".colors()."\""; ?>>
                <div class="modal-header" style="border-bottom-color: #808080;">
                    <h5 class="modal-title" id="exampleModalLabel">Придумайте название группы:</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" <?php echo "style=\"".colors()."\""; ?>>
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/MyToDo/action/group-task/groupAdd.php" method="post">
                    <div class="modal-body">
                        <input <?php echo "style=\"border-color: #35363b; ".colors()."\""; ?> maxlength="13" autocomplete="off" type="text" name="name_group" class="form-control" id="validationTooltip01" placeholder="Название... (Кратко и одним словом)">
                        <div class="row justify-content-end">
                            <button type="submit" class="btn btn-outline-secondary button-add">Создать группу</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>



<!--Модальное окно подтверждения удаления-->

    <div class="modal fade" id="exampleModalDell" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelDell" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" <?php echo "style=\"".colors()."\""; ?>>
                <div class="modal-header" style="border-bottom-color: #808080;">
                    <h5 class="modal-title" id="exampleModalLabelDell">Вы точно хотите удалить группу?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" <?php echo "style=\"".colors()."\""; ?>>
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <div class="modal-body">
                        <div class="row justify-content-end">
                            <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-outline-primary button-no">Отмена</button>
                            <a type="submit" class="btn btn-outline-danger button-yes">Удалить</a>
                        </div>
                    </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $('#exampleModalDell').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var recipient = button.data('whatever');

            document.querySelector(".button-yes").href = recipient;
        })
    </script>

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/MyToDo/body/footer.php';
?>