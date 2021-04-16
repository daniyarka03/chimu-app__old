<?php

try {
    $notification_data_id = $_GET['order'];

    $data = R::findOne('notifications', 'id_notification = ?', array($notification_data_id));
    $data_project = R::findOne('projects', 'id_project = ?', array($data['id_project']));
    $id_project = explode(', ', $data_project->id_project);

    $user_sender = R::findOne('users', 'id_user = ?', array($data['user_sender']));


    if (isset($_POST['request'])) {
        $project = $_POST['id_project'];
        $user_sender_id = $_POST['user_sender'];
        $array = explode(',',  filter_var(trim($_POST['members_project']), FILTER_SANITIZE_STRING));

        array_push($array, $user_sender_id);
        $array2 = implode(',', $array);

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
        $notifications->text = 'Тебя приняли в проект: ' . $project->title;
        $notifications->user_sender = $_COOKIE['id'];
        $notifications->is_checked = "false";
        $notifications->user_recipient = $user_sender_id;
        $notifications->theme = "Принятие в проект";
        R::store($notifications);

    } else {
        echo 'False';
    }

    if (isset($_POST['check_profile'])) {

    }

    if (isset($_POST['cancel'])) {
        $project = $_POST['id_project'];
        $user_sender_id = $_POST['user_sender'];
        $data_project = R::findOne('projects', 'id_project = ?', array($project));


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
        $notifications->text = "Проект: $data_project->title отказал в вашей заявке для вступления";
        $notifications->user_sender = $_COOKIE['id'];
        $notifications->is_checked = "false";
        $notifications->user_recipient = $user_sender_id;
        $notifications->theme = "Отказ во вступлении в проект";
        R::store($notifications);
    }
} catch (Throwable $e) {
    echo $e;
}

?>



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
                <input type="hidden" name="members_project" value=<?= $data_project['members_project'] ?>>
                <textarea type="text" name="request_message" placeholder="Пишите здесь..."></textarea>
                <button type="submit" value="ss" name="request" >Принять пользователя в команду</button>
                <button type="submit" name="cancel">Отказать во вступлении!</button>
                <button type="submit" name="check_profile">Посмотреть профиль пользователя</button>
            </form>

            <a href="?" class="modal__close">&times;</a>
        </div>
    </div>