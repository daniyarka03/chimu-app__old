<?php
    try {
        require "php/includes/db.php";
        $id_user = $_COOKIE['id'];
        $notifications = R::findAll('notifications', "user_recipient LIKE ? ", array($id_user));

    } catch (Throwable $e) {
        echo $e;
    }
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
        .block {
            width: 400px;
            height: auto;
            background: #c4c4c4;
            border: 2px solid #000;
            padding: 10px 10px;
        }

        .open_popup {
            display: block;
        }
    </style>
</head>
<body>

    <h2>Notifications</h2>
    <div>
        <?php

        foreach($notifications as $notification) {
            ?>
            <div class="block">
                <p><?= $notification['text'] ?></p>
                <span><?= $notification['theme'] ?></span>
                <button class="open_popup">Открыть уведомление</button>
            </div>
            <?php
        }

        ?>

    </div>

</body>
</html>