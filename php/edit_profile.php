<?php

    require 'includes/db.php';

   try {
       $firstname = filter_var(trim($_POST['firstname']), FILTER_SANITIZE_STRING);
       $lastname = filter_var(trim($_POST['lastname']), FILTER_SANITIZE_STRING);
       $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);

       $user = R::load('users', $_COOKIE['id']);
       $user->first_name = $firstname;
       $user->last_name = $lastname;
       $user->email = $email;

       R::store($user);
       R::close();

       if ($_POST['do_signup'] == true) {
           header("Location: ../profile.php");
       }
   } catch (Throwable $e) {
       echo $e;
   }
?>