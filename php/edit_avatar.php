<?php
    require 'includes/db.php';
    
    if (isset($_POST['edit_image'])) {
        $users_image_id = uniqid(rand(), true);
        $users_item = R::findAll('users');
        foreach ($users_item as $item) {
            if ($item->avatar == $users_image_id) {
                $users_image_id = uniqid(rand(), true);
            }
        }

        $fileExt = pathinfo($_FILES['file']['name'] ?? "", PATHINFO_EXTENSION);
        move_uploaded_file($_FILES['file']['tmp_name'] ?? "", "../uploades/profile_photo/".$users_image_id.'.'.$fileExt);

        $user = R::findOne('users', 'id_user = ?', array($_COOKIE['id']));
        $user->avatar = $users_image_id.'.'.$fileExt;
        R::store($user);
        R::close();

        header('Location: ../profile');
    }

    if (isset($_POST['edit_image_project'])) {
        $project_image_id = uniqid(rand(), true);
        $projects_item = R::findAll('users');
        foreach ($projects_item as $item) {
            if ($item->project_image == $project_image_id) {
                $project_image_id = uniqid(rand(), true);
            }
        }

        $fileExt = pathinfo($_FILES['file']['name'] ?? "", PATHINFO_EXTENSION);
        move_uploaded_file($_FILES['file']['tmp_name'] ?? "", "../uploades/".$project_image_id.'.'.$fileExt);

        $project = R::findOne('projects', 'id_project = ?', array($_POST['id_project']));
        $project->project_image = $project_image_id.'.'.$fileExt;
        R::store($project);
        R::close();

        header('Location: ../project?id='.$project['id']);
    }

?>