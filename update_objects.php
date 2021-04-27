<?php

    require "./php/includes/db.php";

    $id = $_GET['id'];
    $project = R::load('projects', $id);


    $project_category = explode(', ', $project['category']);
    $project_keywords_need_users = explode(', ', $project['keywords_need_users']);

    $size = sizeof($project_category);


//    foreach ($project_category as $item) {
//        echo '<li class="search-choice"><span>111</span><a class="search-choice-close" data-option-array-index="2"></a></li>';
//    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/multiselect_plugin/chosen.min.css">
    <title>Document</title>
</head>
<body>
    <h2>Изменение объекта: <?= $project['title'] ?></h2>
    <form action="./php/update_object.php" method="post">
        <input type="hidden" name="id" value="<?= $id?>"/>
        <div class="form-block">
            <span></span>
            <input type="text" placeholder="Название" name="title_object" value="<?= $project['title'] ?>">
        </div>
        <br>
        <div class="form-block">
            <select data-placeholder="Выберите теги..." name="category_object[]" id="mselect" multiple="" style="width: 300px;">
                <?php


                $work_tags = R::findAll('TBLWorkActivity');



                foreach ($work_tags as $tag) {

                    if(in_array($tag->name_tag, $project_category)) {
                        ?>
                        <option value="<?=$tag->name_tag?>" selected><?=$tag->name_tag?></option>
                        <?php
                    } else {
                        ?>
                        <option value="<?=$tag->name_tag?>"><?=$tag->name_tag?></option>
                        <?php
                    }

                }

                ?>
            </select>
        </div>
        <br>
        <div>
            <span>Кто нужен в проект? (Теги)</span>
            <select name="keywords_need_users[]" id="mselectKeywords" multiple="" style="width: 300px;">
                <optgroup label="Программирование">
                    <?php
                    $tags = R::findAll('TBLTags');

                    foreach ($tags as $tag) {
                        if ($tag->type == "prog") {
                            if(in_array($tag->name_tag, $project_keywords_need_users)) {
                                ?>
                                <option value="<?=$tag->name_tag?>" selected><?=$tag->name_tag?></option>
                                <?php
                            } else {
                                ?>
                                <option value="<?=$tag->name_tag?>"><?=$tag->name_tag?></option>
                                <?php
                            }
                        }
                    }

                    ?>
                </optgroup>
                <optgroup label="Дизайн">
                    <?php
                    $tags = R::findAll('TBLTags');

                    foreach ($tags as $tag) {
                        if ($tag->type == "design") {
                            if(in_array($tag->name_tag, $project_keywords_need_users)) {
                                ?>
                                <option value="<?=$tag->name_tag?>" selected><?=$tag->name_tag?></option>
                                <?php
                            } else {
                                ?>
                                <option value="<?=$tag->name_tag?>"><?=$tag->name_tag?></option>
                                <?php
                            }
                        }
                    }

                    ?>
                </optgroup>
                <optgroup label="Другое">
                    <?php
                    $tags = R::findAll('TBLTags');

                    foreach ($tags as $tag) {
                        if ($tag->type == "" ) {
                            if(in_array($tag->name_tag, $project_keywords_need_users)) {
                                ?>
                                <option value="<?=$tag->name_tag?>" selected><?=$tag->name_tag?></option>
                                <?php
                            } else {
                                ?>
                                <option value="<?=$tag->name_tag?>"><?=$tag->name_tag?></option>
                                <?php
                            }
                        }
                    }

                    ?>
                </optgroup>
            </select>
        </div>
        <div>
            <span>Описание</span>
            <textarea name="descr" value="<?php @$_POST['descr'] ?>"><?= $project->descr ?></textarea>
        </div>
        <div>
            <span>Социальные сети</span>
            <input name="social_media" value="<?= $project->social_media ?>" />
        </div>
        <div class="form-block">
            <input type="submit" value="Изменить">
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