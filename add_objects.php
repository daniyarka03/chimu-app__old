<?php
    require 'php/includes/db.php';
    $work_tags = R::findAll('TBLWorkActivity');
    $tags = R::findAll('TBLTags');
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/multiselect_plugin/chosen.min.css">
    <title>Создание нового проекта</title>
    <style>
        .form-block {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h2>Добавление нового объекта</h2>
    <form action="php/add_object.php" method="POST">
        <div class="form-block">
            <input type="text" placeholder="Название" name="title_object" class="input_form">
        </div>
        <div class="form-block">
            <select name="category_object[]" id="mselect" multiple="" style="width: 300px;">
                <?php
                    foreach ($work_tags as $tag) {
                        echo "<option value=$tag->name_tag>$tag->name_tag</option>";
                    }
                ?>
            </select>
        </div>
        <div>
            <span>Кто нужен в проект? (Теги)</span>
            <select name="keywords_need_users[]" id="mselectKeywords" multiple="" style="width: 300px;">
                <optgroup label="Программирование">
                    <?php
                        foreach ($tags as $tag) {
                            if ($tag->type == "prog") {
                                echo "<option value=$tag->name_tag>$tag->name_tag</option>";
                            }
                        }
                    ?>
                </optgroup>
                <optgroup label="Дизайн">
                    <?php
                        foreach ($tags as $tag) {
                            if ($tag->type == "design") {
                                echo "<option value=$tag->name_tag>$tag->name_tag</option>";
                            }
                        }
                    ?>
                </optgroup>
                <optgroup label="Другое">
                    <?php
                        foreach ($tags as $tag) {
                            if ($tag->type == "") {
                                echo "<option value=$tag->name_tag>$tag->name_tag</option>";
                            }
                        }
                    ?>
                </optgroup>
            </select>
        </div>
        <div>
            <span>Описание</span>
            <textarea name="descr" value="<?php @$_POST['descr'] ?>"></textarea>
        </div>
        <div>
            <span>Социальные сети</span>
            <input name="social_media" value="<?php @$_POST['social_media'] ?>" />
        </div>
        <div class="form-block">
            <input type="submit" value="Создать" id="submit">
        </div>
    </form>

    <script src="js/jquery.js"></script>
    <script src="js/multiselect_plugin/chosen.jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#mselect').chosen();
            $('#mselectKeywords').chosen();
        });
    </script>
</body>
</html>