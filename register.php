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
        require "php/includes/db.php";

        $firstname = filter_var(trim($_POST['firstname']), FILTER_SANITIZE_STRING);
        $lastname = filter_var(trim($_POST['lastname']), FILTER_SANITIZE_STRING);
        $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
        $pass = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);
        $pass2 = filter_var(trim($_POST['password_2']), FILTER_SANITIZE_STRING);

        if ($_POST['do_signup']) {
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
            $user->pass = password_hash($pass, PASSWORD_DEFAULT);;

            R::store($user);

        }



    } catch (Throwable $e) {
        echo $e;
    }
?>


    <form action="./register.php" method="POST">
        <div>
            <span>Имя</span>
            <input type="text" name="firstname" value="<?php @$_POST['firstname'] ?>">
        </div>
        <div>
            <span>Фамилие</span>
            <input type="text" name="lastname" value="<?php @$_POST['lastname'] ?>">
        </div>
        <div>
            <span>Email</span>
            <input type="email" name="email" value="<?php @$_POST['email'] ?>">
        </div>
        <div>
            <span>Пароль</span>
            <input type="password" name="password" value="<?php @$_POST['password'] ?>">
        </div>
        <div>
            <span>Подтвердите пароль</span>
            <input type="password" name="password_2" value="<?php @$_POST['password_2'] ?>">
        </div>
        <div>
            <button type="submit" value="register" name="do_signup">Зарегистрироваться</button>
        </div>
    </form>
</body>
</html>