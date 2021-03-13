<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register page</title>
</head>
<body>

<?php
       try {
        require "php/includes/rb.php";
        R::setup('mysql:host=localhost;dbname=chimu-team', 'root', '' );

        $firstname = filter_var(trim($_POST['firstname']), FILTER_SANITIZE_STRING);
        $lastname = filter_var(trim($_POST['lastname']), FILTER_SANITIZE_STRING);
        $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
        $pass = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);
        $pass2 = filter_var(trim($_POST['password_2']), FILTER_SANITIZE_STRING);


        if ($pass != $pass2) {
            header('Location: /chimu-app/register.php/');
            exit();
        }

        // if (mb_strlen($name) < 1 || mb_strlen($name) > 90) {
        //     echo "Недопустимая длина имени";
        // }
        
        $user = R::dispense('users');
        $user->first_name = $firstname;
        $user->last_name = $lastname;
        $user->email = $email;
        $user->pass = password_hash($pass, PASSWORD_DEFAULT);
        
        R::store($user);
        R::close();

        if ($_POST['do_signup'] == true) {
            header("Location: /chimu-app");
        }

        


        // $data = $_POST;
        // if (isset($data['do_signup'])) {
        //     // регистрация
        //     $errors = array();

        //     if (trim($data['login']) == '') {
        //         $errors[] = 'Введите логин';
        //     }
        //     if (trim($data['email']) == '') {
        //         $errors[] = 'Введите почту';
        //     }
        //     if ($data['password'] == '') {
        //         $errors[] = 'Введите пароль';
        //     }
        //     if ($data['password_2'] != $data['password']) {
        //         $errors[] = 'Повторный пароль введен неверно';
        //     }

        //     if (empty($errors)) {
        //         $user = R::dispense('users');
        //         $user->login = $data['login'];
        //         $user->email = $data['email'];
        //         $user->login = $data['password'];
        //         R:store($user);
        //         echo 'Success';
        //     } else {
        //         echo '<div id="error" style="color: red;">'.array_shift($errors).'</div><hr>';
        //     }
        // }
       } catch (Throwable $e) {
           echo $e;
       }
?>


    <form action="./register.php" method="POST">
        <div>
            <span>Имя</span>
            <input type="text" name="firstname" value="<?php @$data['firstname'] ?>">
        </div>
        <div>
            <span>Фамилие</span>
            <input type="text" name="lastname" value="<?php @$data['lastname'] ?>">
        </div>
        <div>
            <span>Email</span>
            <input type="email" name="email" value="<?php @$data['email'] ?>">
        </div>
        <div>
            <span>Пароль</span>
            <input type="password" name="password" value="<?php @$data['password'] ?>">
        </div>
        <div>
            <span>Подтвердите пароль</span>
            <input type="password" name="password_2" value="<?php @$data['password_2'] ?>">
        </div>
        <div>
            <button type="submit" value="register" name="do_signup">Зарегистрироваться</button>
        </div>
    </form>
</body>
</html>