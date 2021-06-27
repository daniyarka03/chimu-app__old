<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <?php
        try {
            // Импортируем файл db.php, чтобы соединиться с бд
            require "php/includes/db.php";


            // Переменные данных с разметки
            $email = filter_var(trim($_POST['email'] ?? ""), FILTER_SANITIZE_STRING);
            $pass = filter_var(trim($_POST['password'] ?? ""), FILTER_SANITIZE_STRING);

            if ($_POST['do_signup'] ?? "") {
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
                
            }

            R::close();
        } catch (Throwable $e) {
            // Выводим ошибку, если она имеется
            echo $e;
        }
    ?>
    <div class="section-login">
        <h2 class="section-login__title">Войти в аккаунт</h2>
        <form action="./login" method="POST">
            <div class="section-login__forms">
                <input class="section-login__input input-form" type="email" name="email" value="<?php echo $email; ?>" placeholder="Эл. почта">
                <input class="section-login__input input-form" type="password" name="password" value="<?php @$_POST['password'] ?>" placeholder="Пароль">
                <span class="section-login__error">
                    <?php if (!empty($errors)) {
                        echo array_shift($errors);
                    } ?>
                </span>  
            </div>
            <div class="section-login__controls">
                <button type="submit" name="do_signup" value="1" class="section-login__button_login">Войти</button>
                <a href="register" class="section-login__link">Нет аккаунта? Зарегистрироваться</a>
            </div>
        </form>
    </div>
    <script src="js/inputs.js"></script>
</body>
</html>