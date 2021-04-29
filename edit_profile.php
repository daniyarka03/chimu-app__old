<?php
    // Импорт бд
    require 'php/includes/db.php';

    // Поиск текущего пользователя по id
    $profile = R::findOne('users', 'id_user = ?', array($_COOKIE['id']));

    // Импорт данных с бд
    $work_activity_tags = explode(', ', $profile->work_activity);
    $profile_tags = explode(', ', $profile->keywords_profile);
    $profile_country = explode(', ', $profile->country);
    $gender = explode(', ', $profile->gender);
    $city = explode(', ', $profile->city);
    $birthdate = $profile->birthdate;
    $descr = $profile->descr;

    // Импорт доп. данных с бд
    $tags = R::findAll('TBLTags');
    $tagsCountry = R::findAll('TBLCountries');
    $gender_data = ['Мужской', 'Женский', 'Другое'];
    $work_tags = R::findAll('TBLWorkActivity');
    $tagsCity = R::findAll('TBLCity');

    $country = $profile->country;

?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include 'php/lib_js.php' ?>
    <title>Изменение профиля</title>
</head>
<body>
    <form action="php/edit_profile.php" method="POST">
        <!-- Имя -->
        <div class="form-block">
            <span>Имя</span><br>
            <input type="text" name="firstname" value="<?=$profile->first_name?>">
        </div>
<!--        Фамилия -->
        <div class="form-block">
            <span>Фамилия</span><br>
            <input type="text" name="lastname" value="<?=$profile->last_name?>">
        </div>
<!--        Почта -->
        <div class="form-block">
            <span>Email</span><br>
            <input type="email" name="email" value="<?=$profile->email?>">
        </div>
<!--        Категория -->
        <select name="category_object[]" id="category_object" multiple="" style="width: 300px;">
            <optgroup label="Программирование">
                <?php
                    foreach ($tags as $tag) {
                        if ($tag->type == "prog") {
                            if (in_array($tag->name_tag, $profile_tags)) {
                              echo "<option value=$tag->name_tag selected>$tag->name_tag</option>";
                            } else {
                              echo "<option value=$tag->name_tag>$tag->name_tag</option>";
                            }
                        }
                    }
                ?>
            </optgroup>
            <optgroup label="Дизайн">
                <?php
                foreach ($tags as $tag) {
                    if ($tag->type == "design") {
                        if(in_array($tag->name_tag, $profile_tags)) {
                            echo "<option value=$tag->name_tag selected>$tag->name_tag</option>";
                        } else {
                            echo "<option value=$tag->name_tag>$tag->name_tag</option>";
                        }
                    }
                }
                ?>
            </optgroup>
            <optgroup label="Другое">
                <?php
                foreach ($tags as $tag) {
                    if ($tag->type == "" ) {
                        if(in_array($tag->name_tag, $profile_tags)) {
                            echo "<option value=$tag->name_tag selected>$tag->name_tag</option>";
                        } else {
                            echo "<option value=$tag->name_tag>$tag->name_tag</option>";
                        }
                    }
                }
                ?>
            </optgroup>
        </select> <br>
        <div class="form-block">
            <span>Страна</span>
            <select name="country" id="mselectCountry" style="width: 300px;">
                <?php
                    foreach ($tagsCountry as $tag) {
                        if (in_array($tag->country_name, $profile_country)) {
                            echo "<option value=$tag->country_name selected>$tag->country_name</option>";
                        } else {
                            echo "<option value=$tag->country_name>$tag->country_name</option>";
                        }
                    }
                ?>
            </select>
        </div>
        <div class="form-block">
            <span>Город</span>
            <select name="city" id="mselectCity" style="width: 300px;">
                <?php
                foreach ($tagsCity as $tag) {
                    if (in_array($tag->city_name, $city)) {
                        echo "<option value=$tag->city_name selected>$tag->city_name</option>";
                    } else {
                        echo "<option value=$tag->city_name>$tag->city_name</option>";
                    }
                }
                ?>
            </select>
        </div>
        <div class="form-block">
            <span>Сфера деятельности</span>
            <select name="work_activity[]" id="mselectWork" multiple="" style="width: 300px;">
                <?php
                foreach ($work_tags as $tag) {
                    if (in_array($tag->name_tag, $work_activity_tags)) {
                        echo "<option value=$tag->name_tag selected>$tag->name_tag</option>";
                    } else {
                        echo "<option value=$tag->name_tag>$tag->name_tag</option>";
                    }
                }
                ?>
            </select>
        </div>
        <div>
            <span>Дата рождения</span>
            <input type="date" name="birthdate" value=<?= $birthdate ?>>
        </div>
        <div>
            <span>Пол</span>
            <select name="gender" id="mselectGender" style="width: 300px;">
               <?php
               foreach ($gender_data as $tag) {
                   if (in_array($tag, $gender)) {
                       echo "<option value=$tag selected>$tag</option>";
                   } else {
                       echo "<option value=$tag>$tag</option>";
                   }
               }
               ?>
            </select>
        </div>
        <div>
            <span>Описание</span>
            <textarea name="descr" value="<?php @$_POST['descr'] ?>"><?= $descr  ?></textarea>
        </div>
        <input type="submit" value="Изменить" name="do_signup">
    </form>
</body>
</html>