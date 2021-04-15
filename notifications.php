<?php
    try {
        require "php/includes/db.php";
        $id_user = $_COOKIE['id'];
        $notifications = R::findAll('notifications', "user_recipient LIKE ? ", array($id_user));

    } catch (Throwable $e) {
        echo $e;
    }


    try {
        $notification_data_id = $_GET['order'];

        $data = R::findOne('notifications', 'id_notification = ?', array($notification_data_id));
        $data_project = R::findOne('projects', 'id_project = ?', array($data['id_project']));
        $id_project = explode(', ', $data_project->id_project);

        $user_sender = R::findOne('users', 'id_user = ?', array($data['user_sender']));




    if (isset($_POST['request'])) {
        $project = $_POST['id_project'];
        $user_sender_id = $_POST['user_sender'];
        $upload_project = R::findOne('projects', 'id_project = ?', array($project));
        $upload_project->members_project = $user_sender_id;
        R::store($upload_project);
    } else {
        echo 'False';
    }

    if (isset($_POST['check_profile'])) {

    }
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
            margin-bottom: 20px;
        }

        .open_popup {
            display: block;
        }
    </style>
    <style>

        * {
            box-sizing: border-box;
        }

        .wrapper a {
            display: inline-block;
            text-decoration: none;
            padding: 15px;
            background-color: #fff;
            border-radius: 3px;
            text-transform: uppercase;
            color: #585858;
            font-family: 'Roboto', sans-serif;
        }

        .modal {
            visibility: hidden;
            opacity: 0;
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(77, 77, 77, .7);
            transition: all .4s;
        }

        .modal-active {
            visibility: visible;
            opacity: 1;
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(77, 77, 77, .7);
            transition: all .4s;
        }



        .modal__content {
            border-radius: 4px;
            position: relative;
            width: 500px;
            max-width: 90%;
            background: #fff;
            padding: 1em 2em;
        }

        .modal__footer {
            text-align: right;
        a {
            color: #585858;
        }
        i {
            color: #d02d2c;
        }
        }
        .modal__close {
            position: absolute;
            top: 10px;
            right: 10px;
            color: #585858;
            text-decoration: none;
            font-size: 36px;
            color: red;
        }

        .modal:target {
            visibility: visible;
            opacity: 1;
        }

        .modal__content  textarea {
            display: block;
            width: 100%;
            height: 150px;
            padding: 10px;
        }

        .modal__content form button[type="submit"] {
            width: 100%;
            margin-top: 20px;
            padding: 10px 0;
        }
    </style>
</head>
<body>

    <h2>Notifications</h2>
    <div>
        <?php

        if ($notifications) {
            foreach($notifications as $notification) {
                $data_project = R::findOne('projects', 'id_project = ?', array($notification['id_project']));
                ?>
                <div class="block">
                    <span><?= $notification['theme']  . ': ' . $data_project->title ?></span>
                    <p><?= $notification['text'] ?></p>

                    <a href="?order=<?= $notification['id_notification'] ?>&#demo-modal" class="open_popup">Открыть уведомление</a>

                </div>
                <?php
            }
        } else {
            ?>
                <div class="block">
                    <h2>Нет уведомлений!</h2>
                </div>
            <?php
        }

        ?>

    </div>



    <div id="demo-modal" class="modal">
        <div class="modal__content">
            <h2>
                <?= $data['theme'] . ': ' . $data_project->title ?>
            </h2>
            <p>
                Сообщение: <?= $data['text'] ?>
            </p>
            <p>
                Отправитель: <?= $user_sender['first_name'] ?>
            </p>

            <form action="notifications.php" method="POST">
                <input type="hidden" name="user_sender" value=<?= $user_sender['id_user'] ?>>
                <input type="hidden" name="id_project" value=<?= $data_project['id_project'] ?>>
                <textarea type="text" name="request_message" placeholder="Пишите здесь..."></textarea>
                <button type="submit" value="ss" name="request" >Принять пользователя в команду</button>
                <button type="submit" name="cancel">Отказать во вступлении!</button>
                <button type="submit" name="check_profile">Посмотреть профиль пользователя</button>
            </form>

            <a href="?" class="modal__close">&times;</a>
        </div>
    </div>
</body>
</html>