<?php

    try {
        $notification_data_id = $_GET['order'] ?? "";

        $data = R::findOne('notifications', 'id_notification = ?', array($notification_data_id));
        $data_project = R::findOne('projects', 'id_project = ?', array($data['id_project']  ?? ""));
        $id_project = explode(', ', $data_project->id_project ?? "");

        $user_sender = R::findOne('users', 'id_user = ?', array($data['user_sender'] ?? ""));


        if (isset($_POST['request_join'])) {
            $project = $_POST['id_project'];
            $user_sender_id = $_POST['user_sender'];
            $array = explode(',',  filter_var(trim($_POST['members_project']), FILTER_SANITIZE_STRING));

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
            $notifications->text = 'Тебя приняли в проект: ' . $upload_project->title;
            $notifications->user_sender = $_COOKIE['id'];
            $notifications->is_checked = "false";
            $notifications->user_recipient = $user_sender_id;
            $notifications->theme = "Принятие в проект";
            R::store($notifications);
            R::close();



    //        header("Location: notifications.php");
        }

        if (isset($_POST['check_profile'])) {
            $user_sender_id = $_POST['user_sender'];
            $project = R::findOne('users', 'id_user = ?', array($user_sender_id));
            header("Location: user.php?id=$project->id");
            
        }

        if (isset($_POST['cancel_join'])) {
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

            $current_notification = R::findOne('notifications', 'id_notification = ?', array($_POST['current_notification_id']));
            $current_notification->is_checked = "true";
            R::store($current_notification);

        }
    } catch (Throwable $e) {
        echo $e;
    }

?>



<div id="join_project" class="modal modal_join_project">
        <div class="modal__content">
            <h2 class="modal__title">
                <?= $data['theme'] . ': ' . $data_project->title ?>
            </h2>
            <p class="modal__subtext">
                Отправитель: <?= $user_sender['first_name'] ?? "" ?>
            </p>
            <p class="modal__subtext">
                Сообщение: <br /> <?php echo ($data['text'] != "") ? $data['text'] : 'Пусто'; ?>
            </p>
           

            <?php 
            
            if ($data['is_checked'] == "true") :
            
            ?>

            <form action="notifications.php" method="POST">
                <input type="hidden" name="user_sender" value=<?= $user_sender['id_user'] ?? "" ?>>
                <input type="hidden" name="id_project" value=<?= $data_project['id_project'] ?? "" ?>>
                <input type="hidden" name="members_project" value=<?= $data_project['members_project'] ?? "" ?>>
                <input type="hidden" name="current_notification_id" value=<?= $_GET['order'] ?? "" ?>>
                <!-- <textarea type="text" name="request_message" placeholder="Пишите здесь..."></textarea> -->
                <button class="modal__button" type="submit" name="check_profile">Посмотреть профиль пользователя</button>
                <a href="#" ><button class="modal__button modal__button_close">Закрыть</button></a>

            </form>
            <?php 

            else:

                ?>
             <form action="notifications.php" method="POST">
                <input type="hidden" name="user_sender" value=<?= $user_sender['id_user'] ?? "" ?>>
                <input type="hidden" name="id_project" value=<?= $data_project['id_project'] ?? "" ?>>
                <input type="hidden" name="members_project" value=<?= $data_project['members_project'] ?? "" ?>>
                <input type="hidden" name="current_notification_id" value=<?= $_GET['order'] ?? "" ?>>
                <!-- <textarea type="text" name="request_message" placeholder="Пишите здесь..."></textarea> -->
                <button class="modal__button" type="submit" value="ss" name="request_join" >Принять пользователя в команду</button>
                <button class="modal__button" type="submit" name="check_profile">Посмотреть профиль пользователя</button>
                <button class="modal__button modal__button_close" type="submit" name="cancel_join">Отказать во вступлении!</button>
                <a href="#" ><button class="modal__button modal__button_close">Закрыть</button></a>
                
            </form>
                <?php 
                
            endif;
                
                ?>

        </div>
    </div>