<?php
        try {
            // Импортируем файл db.php, чтобы соединиться с бд
            require "includes/db.php";


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
                        header('Location: ../profile');
                    } else {
                        echo 'Пароль введен не верно!';
                    }
                } else {
                    echo 'Пользователь с таким email не найден';
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