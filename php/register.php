<?php
try {
		 require "includes/db.php";

        $firstname = filter_var(trim($_POST['firstname'] ?? ""), FILTER_SANITIZE_STRING);
        $lastname = filter_var(trim($_POST['lastname'] ?? ""), FILTER_SANITIZE_STRING);
        $email = filter_var(trim($_POST['email'] ?? ""), FILTER_SANITIZE_STRING);
        $pass = filter_var(trim($_POST['password'] ?? ""), FILTER_SANITIZE_STRING);
        $pass2 = filter_var(trim($_POST['password_2'] ?? ""), FILTER_SANITIZE_STRING);
        $country = filter_var(trim($_POST['country'] ?? ""), FILTER_SANITIZE_STRING);
        // $city = filter_var(trim($_POST['city'] ?? ""), FILTER_SANITIZE_STRING);
        $birthdate = filter_var(trim($_POST['birthdate'] ?? ""), FILTER_SANITIZE_STRING);
        $gender = filter_var(trim($_POST['gender'] ?? ""), FILTER_SANITIZE_STRING);
        $descr = filter_var(trim($_POST['descr'] ?? ""), FILTER_SANITIZE_STRING);

        // $social_media_vk = filter_var(trim($_POST['social_media_vk'] ?? ""), FILTER_SANITIZE_STRING);
        // $social_media_facebook = filter_var(trim($_POST['social_media_facebook'] ?? ""), FILTER_SANITIZE_STRING);
        $social_media_instagram = filter_var(trim($_POST['social_media_instagram'] ?? ""), FILTER_SANITIZE_STRING);
        $social_media_telegram = filter_var(trim($_POST['social_media_telegram'] ?? ""), FILTER_SANITIZE_STRING);

        $profile_photo_id = uniqid(rand(), true);
        $profile_photo_item = R::findAll('users');
        foreach ($profile_photo_item as $item) {
            if ($item->avatar == $profile_photo_id) {
                $profile_photo_id = uniqid(rand(), true);
            }
        }

       $fileExt = pathinfo($_FILES['file']['name'] ?? "", PATHINFO_EXTENSION);
        move_uploaded_file($_FILES['file']['tmp_name'] ?? "", "../uploades/profile_photo/".$profile_photo_id.'.'.$fileExt);

        

        if ($_POST['do_signup'] ?? "") {


            if ($pass != $pass2) {
                echo 'Пароли не совпадают!';
            } else {

            $work_activity = implode(', ', $_REQUEST['work_activity']);
            $keywords_profile = implode(', ', $_REQUEST['keywords_profile']);
            $id = uniqid(rand(), true);

            $users = R::findAll('users');
            foreach ($users as $item) {
                if ($item->id_user == $id) {
                    $id = uniqid(rand(), true);
                }
            }

            $user = R::dispense('users');
            $user->id_user = $id;
            $user->first_name = $firstname;
            $user->last_name = $lastname;
            $user->email = $email;
            $user->pass = password_hash($pass, PASSWORD_DEFAULT);
            $user->country = $country;
            // $user->city = $city;
            $user->work_activity = $work_activity;
            $user->keywords_profile = $keywords_profile;
            $user->birthdate = $birthdate;
            $user->gender = $gender;
            $user->descr = $descr;
            // $user->social_media_vk = $social_media_vk;
            // $user->social_media_facebook = $social_media_facebook;
            $user->social_media_instagram = $social_media_instagram;
            $user->social_media_telegram = $social_media_telegram;
            $user->avatar = $profile_photo_id.'.'.$fileExt;

            R::store($user);

            setcookie('temporary_email', $email, time() + 120, "/");
            header('Location: ../login');
            }
        }



    } catch (Throwable $e) {
        echo $e;
    }
?>