<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <title>Document</title>
    <style>

        * {
            box-sizing: border-box;
        }

        .wrapper a {
            display: inline-block;
            text-decoration: none;
            padding: 15px;
            background-color: #fff;
            border-radius: 3px;
            text-transform: uppercase;
            color: #585858;
            font-family: 'Roboto', sans-serif;
        }

        .modal {
            visibility: hidden;
            opacity: 0;
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(77, 77, 77, .7);
            transition: all .4s;
        }

        .modal:target {
            visibility: visible;
            opacity: 1;
        }

        .modal__content {
            border-radius: 4px;
            position: relative;
            width: 500px;
            max-width: 90%;
            background: #fff;
            padding: 1em 2em;
        }

        .modal__footer {
            text-align: right;
        a {
            color: #585858;
        }
        i {
            color: #d02d2c;
        }
        }
        .modal__close {
            position: absolute;
            top: 10px;
            right: 10px;
            color: #585858;
            text-decoration: none;
            font-size: 36px;
            color: red;
        }

        .modal__content  textarea {
            display: block;
            width: 100%;
            height: 150px;
            padding: 10px;
        }

        .modal__content form button[type="submit"] {
            width: 100%;
            margin-top: 20px;
            margin-bottom: 20px;
            padding: 10px 0;
        }
    </style>
</head>
<body>
    <?php
        require "php/includes/db.php";
        $id = $_GET['id'];
        $project = R::load('projects', $id);

        $req_message = filter_var(trim($_POST['request_message']), FILTER_SANITIZE_STRING);
        $project_creator = filter_var(trim($_POST['creator_id']), FILTER_SANITIZE_STRING);
        echo $project_creator;
                $notifications = R::dispense('notifications');
                $notifications->text = $req_message;
                $notifications->user_sender = $_COOKIE['id'];
                $notifications->is_checked = "false";
                $notifications->user_recipient = $project_creator;
                $notifications->theme = "Вступление в проект";


                R::store($notifications);



    ?>

    <h2>Название проекта: <?= $project['title'] ?></h2>
    <span>Создатель: <?= $project['creator_name'] ?></span> <br>
    <span>Категория: <b><?= $project['category'] ?></b></span> <br>

    <?php if ($_COOKIE['id'] == $project['creator_id']): ?>
        <a href="update_objects.php?id=<?= $project->id?>">Update data</a>
        <a href="php/delete.php?id=<?= $project->id?>">Delete data</a>
    <?php else: ?>
        <a href="#demo-modal" class="join_project__button">Join Project</a>
    <?php endif; ?>


    <div id="demo-modal" class="modal">
        <div class="modal__content">
            <h1>Заявка по вступлению в проект</h1>
            <p>
                Расскажите о себе, а также напишите, чем полезны вы могли бы быть проекту!
            </p>

            <form action="project.php" method="POST">
                <input type="hidden" name="creator_id" value=<?= $project['creator_id'] ?>>
                <textarea type="text" name="request_message" placeholder="Пишите здесь..."></textarea>
                <button type="submit" name="request">Отправить</button>
            </form>


            <a href="#" class="modal__close">&times;</a>
        </div>
    </div>

    <script>
        const join_project__button = document.querySelector('.join_project__button');
        join_project__button.addEventListener('click', () => {

        });
    </script>

</body>
</html>