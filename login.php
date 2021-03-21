<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
</head>
<body>
<?php
    
    try {
        // Импортируем файл db.php, чтобы соединиться с бд
        require "php/includes/db.php";


        // Переменные данных с разметки
        $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
        $pass = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);

        if ($_POST['do_signup']) {
            $erros = array();
            $user = R::findOne('users', 'email = ?', array($email));
            if ($user) {
                if (password_verify($pass, $user->pass)) {
                    setcookie('user', $user['first_name'], time() + 3600 * 24 * 30, "/");
                    setcookie('id', $user['id_user'], time() + 3600 * 24 * 30, "/");
                    header('Location: /chimu-app');
                } else {
                    $errors[] = 'Пароль введен не верно!';

                }
            } else {
                $errors[] = 'Пользователь с таким email не найден';
            }
            if (!empty($errors)) {
                echo array_shift($errors);
            }
        }

        R::close();
        

    } catch (Throwable $e) {
        // Выводим ошибку, если она имеется
        echo $e;
    }



    
?>

<form action="./login.php" method="POST">
        <div>
            <span>Email</span>
            <input type="email" name="email" value="<?php @$_POST['email'] ?>">
        </div>
        <div>
            <span>Password</span>
            <input type="password" name="password" value="<?php @$_POST['password'] ?>">
        </div>
        <div>
            <button type="submit" value="login" name="do_signup">Авторизоваться</button>
        </div>
    </form>
</body>
</html>