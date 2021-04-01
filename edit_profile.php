<?php

    require 'php/includes/db.php';

    $profile = R::findOne('users', 'id_user = ?', array($_COOKIE['id']));
    $profile_tags = explode(', ', $profile->work_activity);
    $profile_country = explode(', ', $profile->country);
    $gender = explode(', ', $profile->gender);
    $city = explode(', ', $profile->city);
    $birthdate = $profile->birthdate;

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
                  if ($tag->type == "prog") {
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
                }

                ?>
            </optgroup>
            <optgroup label="Дизайн">
                <?php
                $tags = R::findAll('TBLTags');

                foreach ($tags as $tag) {
                    if ($tag->type == "design") {
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
                }

                ?>
            </optgroup>
            <optgroup label="Другое">
                <?php
                $tags = R::findAll('TBLTags');

                foreach ($tags as $tag) {
                    if ($tag->type == "" ) {
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
                }

                ?>
            </optgroup>
        </select> <br>
        <div class="form-block">
            <span>Страна</span>
            <select name="country" id="mselectCountry" style="width: 300px;">
                <?php
                $tagsCountry = R::findAll('TBLCountries');
                $country = $profile->country;
                foreach ($tagsCountry as $tag) {
                    if(in_array($tag->country_name, $profile_country)) {
                        ?>
                        <option value="<?=$tag->country_name?>" selected><?=$tag->country_name?></option>
                        <?php
                    } else {
                        ?>
                        <option value="<?=$tag->country_name?>"><?=$tag->country_name?></option>
                        <?php
                    }
                }
                ?>

            </select>
        </div>
        <div class="form-block">
            <span>Город</span>
            <select name="city" id="mselectCity" style="width: 300px;">
                <option value=""></option>
                <option value="Астана">Астана</option>
                <option value="Актау">Актау</option>
                <option value="Атырау">Атырау</option>
                <option value="Алматы">Алматы</option>
                <option value="Актобе">Алматы</option>
            </select>
        </div>
        <div class="form-block">
            <span>Сфера деятельности</span>
            <select name="work_activity[]" id="mselectWork" multiple="" style="width: 300px;">
                <?php

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
               $gender_data = ['Мужской', 'Женский', 'Другое'];
               foreach ($gender_data as $tag) {

                   if(in_array($tag, $gender)) {
                       ?>
                       <option value="<?=$tag?>" selected><?=$tag?></option>
                       <?php
                   } else {
                       ?>
                       <option value="<?=$tag?>"><?=$tag?></option>
                       <?php
                   }

               }

               ?>
            </select>
        </div>
        <div>
            <span>Описание</span>
            <textarea name="descr" value="<?php @$_POST['descr'] ?>"></textarea>
        </div>
        <input type="submit" value="Изменить" name="do_signup">
    </form>
</body>
</html>