<?php
$title = "Дневник";
include $_SERVER['DOCUMENT_ROOT'] . '/MyToDo/body/header.php';
require $_SERVER['DOCUMENT_ROOT'] . '/MyToDo/theme/themeFunc.php';
?>
<link rel="stylesheet" href="/MyToDo/style/diary.css">

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
                        <h5 class="modal-title" id="exampleModalLabel">Введите подробности:</h5>
                    </div>
                    <div class="modal-body">
                        <textarea <?php echo "style=\"border-color: #35363b; ".colors()."\""; ?> class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
                        <div class="row justify-content-end">
                            <button type="submit" class="btn btn-outline-secondary button-add">Добавить</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>


<!--    Форма для сортировки-->

    <form class="d-flex justify-content-around" action="/MyToDo/action/diary/diaryAct.php" method="post">
    <select <?php echo "style=\"border-color: #35363b; ".colors()."\""; ?> class="form-control select-sort">
        <option selected value="sortDays">Сортировать по дням</option>
        <option value="days">Отобразить заметки за сегодня</option>
        <option value="treeDays">Отобразить заметки за 3 дня</option>
        <option value="sevenDays">Отобразить заметки за неделю</option>
        <option value="sevenDays">Отобразить только избранные заметки</option>
    </select>
        <button type="submit" class="btn btn-outline-secondary sort-button">Сортировать</button>
    </form>
    <br />


<!--    Список всех записей-->

    <div class="list-group">
        <a data-whatever="1" href="#" data-toggle="modal" data-target="#exampleModalQ" class="list-group-item list-group-item-action active-list">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">Проснулся</h5>
                <small>8:27 | 29.03.2021</small>
            </div>
            <p class="mb-1">Сегодня я проснулся и хуёво себя чувствую)</p>
        </a>
        <a <?php echo "style=\"".colors()."\""; ?> data-whatever="2" href="#" data-toggle="modal" data-target="#exampleModalQ" class="list-group-item list-group-item-action">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">Сходил в туалет</h5>
                <small class="text-muted">8:38 | 29.03.2021</small>
            </div>
            <p class="mb-1">Я сходил в туалет и стал себя чувствовать ещё хуже!) Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur, cupiditate debitis doloremque illum nesciunt odio veniam? Facilis ipsam labore natus perferendis quo quod, similique velit. Impedit maiores molestiae tempore voluptatem?</p>
        </a>
        <a <?php echo "style=\"".colors()."\""; ?> data-whatever="3" href="#" data-toggle="modal" data-target="#exampleModalQ" class="list-group-item list-group-item-action">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">Почистил зубы</h5>
                <small class="text-muted">8:43 | 29.03.2021</small>
            </div>
            <p class="mb-1">Почистил зубы и теперь я готов упасть в дипрессию.</p>
        </a>
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
                        <a id="del" href="#" class="btn btn-outline-danger button-q">Удалить</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<br />
<script type="text/javascript">
    $('#exampleModalQ').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var recipient = button.data('whatever');
        document.querySelector("#bookmarks").href = 'diary/diary-bookmarks.php?id=' + recipient;
        document.querySelector("#del").href = 'diary/diary-del.php?id=' + recipient;
    })
</script>
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/MyToDo/body/footer.php';
?>
