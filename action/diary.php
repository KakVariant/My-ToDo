<?php
$title = "Дневник";
include $_SERVER['DOCUMENT_ROOT'] . '/MyToDo/body/header.php';
require $_SERVER['DOCUMENT_ROOT'] . '/MyToDo/theme/themeFunc.php';
?>
<link rel="stylesheet" href="/MyToDo/style/diary.css">
<?php



//Функция для вывода всех записей дневника
function showListDiary($result)
{
    while (($row = $result->fetch_assoc()) != false)
    {
        if ($row["activity"] == 1)
        {
            $style = "";
            $class = "active-list";
        }
        else
        {
            $style = "style=\"".colors()."\"";
            $class = "";
        }

        echo "<a ".$style." data-description='".$row["description"]."' data-title='".$row["title"]."' data-whatever=\"".$row["id"]."\" href=\"#\" data-toggle=\"modal\" data-target=\"#exampleModalQ\" class=\"list-group-item list-group-item-action ".$class."\">
            <div class=\"d-flex w-100 justify-content-between\">
                <h5 class=\"mb-1\">".$row["title"]."</h5>
                <small>".$row["time"]." | ".$row["date"]."</small>
            </div>
            <p class=\"mb-1\">".$row["description"]."</p>
        </a>";
    }
}




// Вывод всех избранных записей

function showListDiaryMark($result)
{
    while (($row = $result->fetch_assoc()) != false)
    {
        if ($row["activity"] == 1) {
            $style = "";
            $class = "active-list";

            echo "<a " . $style . " data-description='" . $row["description"] . "' data-title='" . $row["title"] . "' data-whatever=\"" . $row["id"] . "\" href=\"#\" data-toggle=\"modal\" data-target=\"#exampleModalQ\" class=\"list-group-item list-group-item-action " . $class . "\">
            <div class=\"d-flex w-100 justify-content-between\">
                <h5 class=\"mb-1\">" . $row["title"] . "</h5>
                <small>" . $row["time"] . " | " . $row["date"] . "</small>
            </div>
            <p class=\"mb-1\">" . $row["description"] . "</p>
        </a>";
        }
    }
}



// Вывод всех записей за определённый день

function showListDiaryDay($result)
{
    while (($row = $result->fetch_assoc()) != false)
    {
        if (!strcmp($_COOKIE["date"], $row["date"])) {
            if ($row["activity"] == 1) {
                $style = "";
                $class = "active-list";
            } else {
                $style = "style=\"" . colors() . "\"";
                $class = "";
            }

            echo "<a " . $style . " data-description='" . $row["description"] . "' data-title='" . $row["title"] . "' data-whatever=\"" . $row["id"] . "\" href=\"#\" data-toggle=\"modal\" data-target=\"#exampleModalQ\" class=\"list-group-item list-group-item-action " . $class . "\">
            <div class=\"d-flex w-100 justify-content-between\">
                <h5 class=\"mb-1\">" . $row["title"] . "</h5>
                <small>" . $row["time"] . " | " . $row["date"] . "</small>
            </div>
            <p class=\"mb-1\">" . $row["description"] . "</p>
        </a>";
        }
    }
}






//Функция для отправки запроса в БД
function query()
{
    $email = preg_replace('/@|\./','', $_COOKIE["email"])."diary";

    require $_SERVER['DOCUMENT_ROOT'] . '/MyToDo/db/dbconfig.php';

    $result = $mysql->query("SELECT * FROM `$email` ORDER BY `$email`.`id` DESC");
    $mysql->close();
    return $result;
}
?>

<br />
<div class="container">

<!--    Форма для ввода новой записи-->

    <form action="/MyToDo/action/diary/diaryAdd.php" method="POST">
        <div class="form-group">
            <h1 class="heading"><em>Your diary, <?=$_COOKIE["name"]?>)</em></h1>
        </div>
        <div class="form-group">
            <div class="input-group mb-3">
                <input <?php echo "style=\"border-color: #35363b; ".colors()."\""; ?> autocomplete="off" maxlength="50" type="text" class="form-control" name="title" placeholder="Введите название заметки" aria-describedby="button-addon2">
                <div class="input-group-append">
                    <a class="btn btn-outline-secondary" data-toggle="modal" name="add_medium" data-target="#exampleModal">Добавить</a>
                </div>
            </div>
        </div>

        <!--    Модальное диалоговое окно для ввода подробного описания-->

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content" <?php echo "style=\"".colors()."\""; ?>>
                    <div class="modal-header" style="border-bottom-color: #808080;">
                        <h5 class="modal-title" id="exampleModalLabel">Введите описане (Болие подробно):</h5>
                    </div>
                    <div class="modal-body">
                        <textarea <?php echo "style=\"border-color: #35363b; ".colors()."\""; ?> class="form-control" id="exampleFormControlTextarea1" rows="3" name="description" placeholder="Введите что-то подобное - ''Я проснулся и готов покорять мир.''"></textarea>
                        <div class="row justify-content-end">
                            <button type="submit" class="btn btn-outline-secondary button-add">Добавить</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>


<!--    Форма для сортировки-->

    <form class="d-flex justify-content-around" action="/MyToDo/action/diary/diarySort.php" method="post">
        <select onchange='findOption(this)' <?php echo "style=\"".colors()."\""; ?> class="custom-select select-sort" name="select-sort" id="select-sort" required>
            <option <?php if (!strcmp($_COOKIE["sort"], "all")) {echo "selected";} ?> value="all">Показать все записи</option>
            <option <?php if (!strcmp($_COOKIE["sort"], "mark")) {echo "selected";} ?> value="mark">Показать только избранные записи</option>
            <option <?php if (!strcmp($_COOKIE["sort"], "day")) {echo "selected";} ?> value="day">Показать записи за определённый день</option>
        </select>
        <input <?php echo "style=\"".colors()."\""; ?> class="inpDate <?php if (strcmp($_COOKIE["sort"], "day")) {echo "hidden";} ?>" name="inpDate" type="date" id="inpDate" value="<?php echo $_COOKIE["date-sf"];?>" min="2001-08-07" max="<?php echo date('Y-m-d')?>">
        <button type="submit" class="btn btn-outline-secondary sort-button">Сортировать</button>
    </form>
    <br />


<!--    Список всех записей-->

    <div class="list-group">
        <?php
        if (!strcmp($_COOKIE["sort"], "all"))
        {
            showListDiary(query());
        }
        if (!strcmp($_COOKIE["sort"], "mark"))
        {
            showListDiaryMark(query());
        }
        if (!strcmp($_COOKIE["sort"], "day"))
        {
            showListDiaryDay(query());
        }
        ?>
    </div>


<!--    Модальное окно для выбора действия-->

    <div class="modal fade" id="exampleModalQ" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" <?php echo "style=\"".colors()."\""; ?>>
                <div class="modal-header" style="border-bottom-color: #808080;">
                    <h5 class="modal-title" id="exampleModalLabel">Что будем делать?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span <?php echo "style=\"".colors()."\""; ?> aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row justify-content-end">
                        <a id="bookmarks" href="#" class="btn btn-outline-primary button-q">Добавить / убрать из закладок</a>
                        <a data-whatever="" data-dismiss="modal" aria-label="Close" data-toggle="modal" data-target="#exampleModalEdit" id="edit" href="#" class="btn btn-outline-warning button-q">Редактировать</a>
                        <a id="del" href="#" class="btn btn-outline-danger button-q">Удалить</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


<!--Модальное окно для редактирования записки-->

    <div class="modal fade" id="exampleModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form action="/MyToDo/action/diary/diaryEdit.php" method="post">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content" <?php echo "style=\"".colors()."\""; ?>>
                    <div class="modal-header" style="border-bottom-color: #808080;">
                        <h5 class="modal-title" id="exampleModalLabel">Редактируйте:</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span <?php echo "style=\"".colors()."\""; ?> aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Заголовок:</label>
                            <input <?php echo "style=\"border-color: #35363b; ".colors()."\""; ?> type="text" class="form-control" name="title" id="title" autocomplete="off" maxlength="50" placeholder="Я проснулся.">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Описание:</label>
                            <textarea <?php echo "style=\"border-color: #35363b; ".colors()."\""; ?> class="form-control" id="description" rows="3" name="description" maxlength="300" placeholder="Сейчас я проснулся и готов покорять мир."></textarea>
                        </div>
                        <div class="row justify-content-end">
                            <button type="submit" name="ok" class="btn btn-outline-secondary button-add edit">Редактировать</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

</div>
<br />
<script type="text/javascript">
    $('#exampleModalQ').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var recipient = button.data('whatever');
        var title = button.data('title');
        var description = button.data('description');

        document.querySelector("#bookmarks").href = 'diary/diaryMark.php?id=' + recipient;
        document.querySelector("#edit").dataset.whatever = recipient;
        document.querySelector("#edit").dataset.title = title;
        document.querySelector("#edit").dataset.description = description;
        document.querySelector("#del").href = 'diary/diaryDelete.php?id=' + recipient;
    })

    $('#exampleModalEdit').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var recipient = button.data('whatever');
        var title = button.data('title');
        var description = button.data('description');

        document.querySelector(".edit").value = recipient;
        document.querySelector("#title").value = title;
        document.querySelector("#description").value = description;
    })

    function findOption(select) {
        if(select.value != "day")
        {
            if (!document.querySelector("#inpDate").classList.contains("hidden"))
            {
                document.querySelector("#inpDate").classList.add("hidden");
            }
        }
        else
        {
            document.querySelector("#inpDate").classList.remove("hidden");
        }
    }
</script>
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/MyToDo/body/footer.php';
?>
