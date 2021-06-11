<?php


try {
    $notification_data_id = $_GET['order'] ?? "";

    $data = R::findOne('notifications', 'id_notification = ?', array($notification_data_id));
    $data_project = R::findOne('projects', 'id_project = ?', array($data['id_project'] ?? ""));
    $id_project = explode(', ', $data_project->id_project ?? "");

    $user_sender = R::findOne('users', 'id_user = ?', array($data['user_sender'] ?? ""));


    if (isset($_POST['request_invite'])) {
        $project = $_POST['id_project'];
        $user_recepient_id = $_POST['user_sender'];
        $current_user = R::findOne('users', 'id_user = ?', array($_COOKIE['id']));
        $array = explode(',',  filter_var(trim($_POST['members_project']), FILTER_SANITIZE_STRING));
        $user_sender_id = $current_user->id_user;
        array_push($array, $user_sender_id);
        $array2 = implode(',', $array);


        $current_notification = R::findOne('notifications', 'id_notification = ?', array($_POST['current_notification_id']));
        $current_notification->is_checked = "true";
        R::store($current_notification);


        $upload_project = R::findOne('projects', 'id_project = ?', array($project));
        $upload_project->members_project = $array2;
        R::store($upload_project);



        // Добавление уведомления, что пользователя приняли в проект
        $id_notification = uniqid(rand(), true);
        $notifications_item = R::findAll('notifications');
        foreach ($notifications_item as $item) {
            if ($item->id_notification == $id_notification) {
                $id_notification = uniqid(rand(), true);
            }
        }
        $notifications = R::dispense('notifications');
        $notifications->id_notification = $id_notification;
        $notifications->id_project = $project;
        $notifications->text = "Пользователь $current_user->first_name принял ваше приглашение по вступлению в проект: $project->title";
        $notifications->user_sender = $_COOKIE['id'];
        $notifications->is_checked = "false";
        $notifications->user_recipient = $user_recepient_id;
        $notifications->theme = "Принятие приглашение в проект";
        R::store($notifications);

        header("Location: ./notifications.php");

    } else {
    }

    if (isset($_POST['check_project'])) {
        $project_id = $_POST['id_project'];
        $project = R::findOne('projects', 'id_project = ?', array($project_id));

        header("Location: project.php?id=$project->id");
    }

    if (isset($_POST['cancel_invite'])) {
        $project = $_POST['id_project'];
        $user_sender_id = $_POST['user_sender'];
        $data_project = R::findOne('projects', 'id_project = ?', array($project));
        $user_sender = R::findOne('users', 'id_user = ?', array($_COOKIE['id']));


        // Добавление уведомления, что пользователя отказался участвовать в проекте
        $id_notification = uniqid(rand(), true);
        $notifications_item = R::findAll('notifications');
        foreach ($notifications_item as $item) {
            if ($item->id_notification == $id_notification) {
                $id_notification = uniqid(rand(), true);
            }
        }
        $notifications = R::dispense('notifications');
        $notifications->id_notification = $id_notification;
        $notifications->id_project = $project;
        $notifications->text = "Пользователь: $user_sender->first_name отказал в вашем приглашении по вступлению в проект $data_project->title";
        $notifications->user_sender = $_COOKIE['id'];
        $notifications->is_checked = "false";
        $notifications->user_recipient = $user_sender_id;
        $notifications->theme = "Отказ во вступлении в проект";
        R::store($notifications);
        header("Location: ./notifications.php");

    }
} catch (Throwable $e) {
    echo $e;
}

?>


<div id="invite_project" class="modal">
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
            <input type="hidden" name="members_project" value=<?= $data_project['members_project'] ?>>
            <input type="hidden" name="current_notification_id" value=<?= $_GET['order'] ?>>
            <button type="submit" value="ss" name="request_invite" >Вступить в проект</button>
            <button type="submit" name="cancel_invite">Отказать в предложении</button>
            <button type="submit" name="check_project">Посмотреть профиль пользователя</button>
        </form>

        <a href="?" class="modal__close">&times;</a>
    </div>
</div>

