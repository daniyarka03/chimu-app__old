<?php

    require 'php/includes/db.php';

    $profile = R::load('users', $_COOKIE['id']);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="php/edit_profile.php" method="POST">
        <div class="form-block"><span>Имя</span><br><input type="text" name="firstname" value="<?=$profile->first_name?>"></div>
        <div class="form-block"><span>Фамилия</span><br><input type="text" name="lastname" value="<?=$profile->last_name?>"></div>
        <div class="form-block"><span>Email</span><br><input type="email" name="email" value="<?=$profile->email?>"></div>
        <input type="submit" value="Изменить" name="do_signup">
    </form>
</body>
</html>