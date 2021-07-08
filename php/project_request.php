<?php
          	require "includes/db.php";

			

            $id_notification = uniqid(rand(), true);
            $notifications_item = R::findAll('notifications');
            foreach ($notifications_item as $item) {
                if ($item->id_notification == $id_notification) {
                    $id_notification = uniqid(rand(), true);
                }
            }

            $req_message = filter_var(trim($_POST['request_message'] ?? ""), FILTER_SANITIZE_STRING);
            $project_creator = filter_var(trim($_POST['creator_id'] ?? ""), FILTER_SANITIZE_STRING);
            $id_project = filter_var(trim($_POST['id_project'] ?? ""), FILTER_SANITIZE_STRING);
			$proj = R::findOne('projects', 'id_project = ?', array($id_project));

            $notifications = R::dispense('notifications');
            $notifications->id_notification = $id_notification;
            $notifications->id_project = $id_project;
            $notifications->text = $req_message;
            $notifications->user_sender = $_COOKIE['id'];
            $notifications->is_checked = "false";
            $notifications->user_recipient = $project_creator;
            $notifications->theme = "Вступление в проект";



            R::store($notifications);
  
  			header('Location: ../project?id='.$proj['id'].'#success-modal');
     
?>