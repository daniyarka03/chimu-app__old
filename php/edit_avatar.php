<?php
    require 'includes/db.php';
    
    if (isset($_POST['edit_image'])) {
        $users_image_id = uniqid(rand(), true);
        $users_item = R::findAll('users');
        foreach ($users_item as $item) {
            if ($item->project_image == $users_image_id) {
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

?>