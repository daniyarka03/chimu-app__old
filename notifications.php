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
       header('Location: notifications');
   }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/notifications.css">
    <link rel="stylesheet" href="css/sidebar.css">
    
    <title>Notifications</title>

</head>
<body>
    <?php include 'php/components/sidebar.php'; ?>
    <main>
    <h2 class="main__title">Уведомление</h2>
    <div>
        <?php

        if ($notifications) {
            foreach($notifications as $notification) {
                $data_project = R::findOne('projects', 'id_project = ?', array($notification['id_project']));
                ?>
                <section class="section section-card">
                    <div class="container">
                        <div class="section-card__content">
                            <img src="img/card__img.png" alt="logo" class="section-card__img">
                            <div class="content__text">
                                <h2 class="section-card__title"><?= $notification['theme'] ?></h2>
                                <span class="section-card__description" id="descr_card"><?= $notification['text'] ?></span>
                            </div>
                        </div>
                        <div class="section-card__controls">
                            <?php if ($notification['theme'] == 'Вступление в проект') echo '<a href="?order='.$notification["id_notification"].'&#demo-modal"><button class="section-card__button-join">Посмотреть</button></a>' ?>
                            <?php if ($notification['theme'] == 'Принятие в проект') echo '<a href="?order='.$notification["id_notification"].'&#accept_user"><button class="section-card__button-join">Посмотреть</button></a>' ?>
                            <?php if ($notification['theme'] == 'Отказ во вступлении в проект') echo '<a href="?order='.$notification["id_notification"].'&#cancel_join"><button class="section-card__button-join">Посмотреть</button></a>' ?>
                            <?php if ($notification['theme'] == 'Приглашение в проект') echo '<a href="?order='.$notification["id_notification"].'&#invite_project"><button class="section-card__button-join">Посмотреть</button></a>' ?>
                            <form action="notifications" method="post">
                                <input type="hidden" name="id_notification" value=<?= $notification['id'] ?>>
                                <a href="notifications"><button type="submit" name="delete_notification" class="section-card__button-view">Удалить</button></a>
                            </form>
                            
                            <span class="section-card__date">16 Апреля</span>
                        </div>
                    </div>
                </section>

                <?php
            }
        } else {
            ?>
                <h2>Нет уведомлений!</h2>
            <?php
        }

        ?>

    </div>
    </main>

    <?php include 'php/components/notifications/join_project_user.php'; ?>
    <?php include 'php/components/notifications/accept_to_project.php'; ?>
    <?php include 'php/components/notifications/cancel_join_project.php'; ?>
    <?php include 'php/components/notifications/invite_to_project.php'; ?>


</body>
</html>