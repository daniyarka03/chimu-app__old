<?php
    try {
        require "php/includes/db.php";
        $id_user = $_COOKIE['id'];
        $notifications = R::findAll('notifications', "user_recipient LIKE ? ", array($id_user));

    } catch (Throwable $e) {
        echo $e;
    }

   if(isset($_POST['delete_notification'])) {
       $id_notification = $_POST['id_notification'];
       $notification = R::findOne('notifications', 'id = ?', array($id_notification));
       R::trash($notification);
       header('Location: ./notifications.php');
   }


?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/notifications.css">
    <title>Document</title>

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

                    <?php

                    if ($notification['theme'] == 'Вступление в проект') {
                        ?>
                    <a href="?order=<?= $notification["id_notification"] ?>&#demo-modal" class="open_popup">Открыть уведомление</a>
                        <?php

                    } else if ($notification['theme'] == 'Принятие в проект') {

                        ?>
                    <a href="?order=<?= $notification['id_notification'] ?>&#accept_user" class="open_popup">Открыть уведомление</a>
                <?php
                    } else if ($notification['theme'] == 'Отказ во вступлении в проект') {

                        ?>
                        <a href="?order=<?= $notification['id_notification'] ?>&#cancel_join" class="open_popup">Открыть уведомление</a>
                        <?php
                    } else if ($notification['theme'] == 'Приглашение в проект') {

                        ?>
                    <a href="?order=<?= $notification['id_notification'] ?>&#invite_project" class="open_popup">Открыть уведомление</a>
                    <?php
                    }
                ?>
                    <form action="notifications.php" method="post">
                        <input type="hidden" name="id_notification" value=<?= $notification['id'] ?>>
                        <button type="submit" name="delete_notification">Delete</button>
                    </form>
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

    <?php include 'php/components/notifications/join_project_user.php'; ?>
    <?php include 'php/components/notifications/accept_to_project.php'; ?>
    <?php include 'php/components/notifications/cancel_join_project.php'; ?>
    <?php include 'php/components/notifications/invite_to_project.php'; ?>


</body>
</html>