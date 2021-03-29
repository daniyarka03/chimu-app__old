<?php

    require 'php/includes/db.php';

    $profile = R::findOne('users', 'id_user = ?', array($_COOKIE['id']));
$profile_tags = explode(', ', $profile->work_activity);

$profile_tags_array = [];

//foreach ($profile_tags as $profile_tag) {
//
//}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include 'php/lib_js.php' ?>
    <title>Document</title>
</head>
<body>
    <form action="php/edit_profile.php" method="POST">
        <div class="form-block"><span>Имя</span><br><input type="text" name="firstname" value="<?=$profile->first_name?>"></div>
        <div class="form-block"><span>Фамилия</span><br><input type="text" name="lastname" value="<?=$profile->last_name?>"></div>
        <div class="form-block"><span>Email</span><br><input type="email" name="email" value="<?=$profile->email?>"></div>
        <select name="category_object[]" id="mselect" multiple="" style="width: 300px;">
            <optgroup label="Программирование">
                <?php

                $tags = R::findAll('TBLTags');


                foreach ($tags as $tag) {
                    if(in_array($tag->name_tag, $profile_tags)) {
                        ?>
                            <option value="<?=$tag->name_tag?>" selected><?=$tag->name_tag?></option>
                        <?php
                    } else {
                        ?>
                        <option value="<?=$tag->name_tag?>"><?=$tag->name_tag?></option>
                        <?php
                    }
                }
//
//                foreach ($tags as $tag) {
//                    ?>
<!--                    <option value="--><?//=$tag->name_tag?><!--">--><?//=$tag->name_tag?><!--</option>-->
<!--                    --><?php
//                }
//


//                foreach ($profile_tags as $tag) {
//                    ?>
<!--                    <option value="--><?//=$tag?><!--" selected>--><?//=$tag?><!--</option>-->
<!--                    --><?php
//                }

                ?>
            </optgroup>
        </select> <br>
        <input type="submit" value="Изменить" name="do_signup">
    </form>
</body>
</html>