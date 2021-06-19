<?php
    require 'includes/db.php';

   try {
       $firstname = filter_var(trim($_POST['firstname']), FILTER_SANITIZE_STRING);
       $lastname = filter_var(trim($_POST['lastname']), FILTER_SANITIZE_STRING);
       $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
       $country = filter_var(trim($_POST['country']), FILTER_SANITIZE_STRING);
    //    $city = filter_var(trim($_REQUEST['city']), FILTER_SANITIZE_STRING);
       $birthdate = filter_var(trim($_POST['birthdate']), FILTER_SANITIZE_STRING);
       $gender = filter_var(trim($_POST['gender']), FILTER_SANITIZE_STRING);
       $descr = filter_var(trim($_POST['descr']), FILTER_SANITIZE_STRING);

       if ($_POST['do_signup'] == true) {
           $work_activity = implode(', ', $_REQUEST['work_activity']);
           $category_object = implode(', ', $_REQUEST['category_object'] ?? "");

           $user = R::findOne('users', 'id_user = ?', array($_COOKIE['id']));
           $user->first_name = $firstname;
           $user->last_name = $lastname;
           $user->email = $email;
           $user->country = $country;
        //    $user->city = $city;
           $user->work_activity = $work_activity;
           $user->birthdate = $birthdate;
           $user->keywords_profile = $category_object;
           $user->gender = $gender;
           $user->descr = $descr;

           $user->id_user = $_COOKIE['id'];

           R::store($user);
           R::close();
           header("Location: ../profile.php");
       }
   } catch (Throwable $e) {
       echo $e;
   }
?>