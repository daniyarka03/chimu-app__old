<?php
//    require "includes/db.php";
//
//        $notification_data_id = $_GET['order'];
//
//        $data = R::findOne('notifications', 'id_notification = ?', array($notification_data_id));
//        $data_project = R::findOne('projects', 'id_project = ?', array($data['id_project']));
//        $id_project = explode(', ', $data_project->id_project);
//        $upload_project = R::findOne('projects', 'id_project = ?', array($data['id_project']));
//
//        $user_sender = R::findOne('users', 'id_user = ?', array($data['user_sender']));
//
//        echo $data_project['title'];
//
//
//        if ($_POST['request'] != "") {
//            echo $data_project['title'];
//
//        } else {
//            echo $data_project['title'];
//        }
//
//    if (isset($_POST['check_profile'])) {
//        echo 'Hello2';
//    }
//?>