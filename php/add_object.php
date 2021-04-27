<?php
    require "includes/db.php";

    try {
        $title_object = filter_var(trim($_POST['title_object']), FILTER_SANITIZE_STRING);
        $descr = filter_var(trim($_POST['descr']), FILTER_SANITIZE_STRING);
        $social_media = filter_var(trim($_POST['social_media']), FILTER_SANITIZE_STRING);
        $category_object = implode(', ', $_REQUEST['category_object']);
        $keywords_need_users = implode(', ', $_REQUEST['keywords_need_users']);

        $id_project = uniqid(rand(), true);
        $notifications_item = R::findAll('projects');
        foreach ($notifications_item as $item) {
            if ($item->id_project == $id_project) {
                $id_project = uniqid(rand(), true);
            }
        }

        $project = R::dispense('projects');
        $project->creator_name = $_COOKIE['user'];
        $project->id_project = $id_project;
        $project->title = $title_object;
        $project->category = $category_object;
        $project->creator_id = $_COOKIE['id'];
        $project->members_project = $_COOKIE['id'];
        $project->social_media = $social_media;
        $project->descr = $descr;
        $project->keywords_need_users = $keywords_need_users;

        R::store($project);
        R::close();

        header('Location: ../list_objects.php');
        exit();
    } catch (Throwable $e) {
        echo $e;
    }
?>