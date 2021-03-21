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
    <style>
        * {
            font-family: sans-serif;
        }
    </style>
</head>
<body>
    <h2>Profile</h2>
    <span>Name: <?= $profile->first_name ?></span> <br>
    <span>Last Name: <?= $profile->last_name ?></span> <br>
    <span>Email: <?= $profile->email ?></span> <br>
    <div class="control-panel">
        <a href="edit_profile.php" class="panel__item"><button>Update info</button></a>
        <a href="php/delete_profile.php" class="panel__item"><button>Delete account</button></a>
        <a href="php/exit.php" class="panel__item"><button>Sign out</button></a>
    </div>
</body>
</html>