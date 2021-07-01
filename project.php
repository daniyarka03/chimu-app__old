<?php
        try {
            require "php/includes/db.php";
            $id = $_GET['id'];
            
            if (!isset($_COOKIE['id'])) {
                header('Location: ./');
            }

            if (!isset($id)) {
                header("Location: /chimu-app");
            }

            $project = R::load('projects', $id);

            $id_notification = uniqid(rand(), true);
            $notifications_item = R::findAll('notifications');
            foreach ($notifications_item as $item) {
                if ($item->id_notification == $id_notification) {
                    $id_notification = uniqid(rand(), true);
                }
            }

            $req_message = filter_var(trim($_POST['request_message'] ?? ""), FILTER_SANITIZE_STRING);
            $project_creator = filter_var(trim($_POST['creator_id'] ?? ""), FILTER_SANITIZE_STRING);
            $id_project = filter_var(trim($_POST['id_project'] ?? ""), FILTER_SANITIZE_STRING);

            if (isset($_POST['request'])) {
                $notifications = R::dispense('notifications');
                $notifications->id_notification = $id_notification;
                $notifications->id_project = $id_project;
                $notifications->text = $req_message;
                $notifications->user_sender = $_COOKIE['id'];
                $notifications->is_checked = "false";
                $notifications->user_recipient = $project_creator;
                $notifications->theme = "Вступление в проект";



                R::store($notifications);
                header('Location: project?id='.$id.'#success-modal');
            }
            
        } catch (Throwable $e) {
            echo $e;
        }



    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/project.css">
    <link rel="stylesheet" href="css/sidebar.css">
    <link
      rel="stylesheet"
      href="https://unpkg.com/swiper/swiper-bundle.min.css"
    />
    <title>Project <?= $project['title'] ?></title>
</head>
<body>
    

    <!-- <h2>Название проекта: <?= $project['title'] ?></h2>
    <span>Создатель: <?= $project['creator_name'] ?></span> <br>
    <span>Категория: <b><?= $project['category'] ?></b></span> <br>

    <?php if ($_COOKIE['id'] == $project['creator_id']): ?>
        <a href="update_objects.php?id=<?= $project->id?>">Update data</a>
        <a href="php/delete.php?id=<?= $project->id?>">Delete data</a>
    <?php else: ?>
        <a href="#demo-modal" class="join_project__button">Join Project</a>
    <?php endif; ?> -->

    <?php include "php/components/sidebar.php" ?>

<main>
    <div class="section section-basic">
        <div class="container">
            <div class="block block-photo">
                <img src="uploades/<?= $project['project_image'] ?>" alt="" class="section-basic__img">
                <?php 
                
                if ($_COOKIE['id'] == $project['creator_id']) {
                    echo '<label for="file_upload" class="block-photo__overlay">
                                <div class="block-photo__text">+</div>
                            </label>';
                }

                ?>
            </div>
            <div class="block">
                <h2 class="section-basic__name"><?= $project['title'] ?></h2>
                <span class="section-basic__date">Создатель проекта: <?= $project['creator_name'] ?></span>
                <span class="section-basic__geolocation"></span>
            </div>
            <div class="block">
                <?php 
                    if ($project['creator_id'] == $_COOKIE['id']) { 
                        echo '<a href="update_objects.php?id='.$project->id.'"><button class="section-basic__button">Редактировать проект</button></a>';
                        echo '<a href="php/delete.php?id='.$project->id.'"><button class="section-basic__button button__red">Удалить проект</button></a>';
                    }?>
                <?php 
                    $members_proj = explode(',',  filter_var(trim($project['members_project']), FILTER_SANITIZE_STRING));
                    $status = in_array($_COOKIE['id'], $members_proj);
                    

                    if (!$status) { 
                        if ($project['creator_id'] != $_COOKIE['id']) echo '<a href="#demo-modal"><button class="section-basic__button">Вступить в проект</button></a>';
                    }
                    ?>
                     <?php 
                    if (in_array($_COOKIE['id'], $members_proj)) { 
                        echo '<a href="php/exit_project.php?id='.$project->id.'"><button class="section-basic__button button__red">Выйти из проекта</button></a>';
                    }?>
            </div>
        </div>
    </div>
    <div class="section section-skills">
        <div class="container">
            <h2 class="section-skills__title section__title">
                Деятельность проекта
            </h2>
            <div class="section-skills__block">
                <?php 
                    $tags = explode(', ', $project->category);
                                
                    foreach ($tags as $tag) {
                        ?>
                        <span class="section-skills__tag"><?=$tag?></span>
                        <?php
                    }
                ?>
            </div>
        </div>
    </div>
    <div class="section section-skills">
        <div class="container">
            <h2 class="section-skills__title section__title">
                Кто нужен
            </h2>
            <div class="section-skills__block">
                <?php 
                    $tags = explode(', ', $project->keywords_need_users);
                                
                    foreach ($tags as $tag) {
                        ?>
                        <span class="section-skills__tag"><?=$tag?></span>
                        <?php
                    }
                ?>
            </div>
        </div>
    </div>
    <section class="section section-about">
        <div class="container">
            <h2 class="section-about__title section__title">О проекте</h2>
            <p class="section-about__text" id="descr">
                <?php
                
                    if ($project->descr != "") {
                        echo $project->descr;
                    } else {
                        echo '( Пользователь еще не добавил описания о себе! )';
                    }
                
                ?>
            </p>
        </div>
    </section>
    <div class="section section-projects">
        <div class="container">
            <h2 class="section-projects__title section__title">Все участники проекта</h2>
            <div class="section-projects__cards swiper-container mySwiper">
                <div class="swiper-wrapper">

            <?php
                $members = explode(',',  filter_var(trim($project['members_project']), FILTER_SANITIZE_STRING));
                    
            ?>
            <?php 
            
                    foreach ($members as $member_id) {
                    
                    $member = R::findOne('users', 'id_user = ?', array($member_id));

            ?>
                <div class="card__block swiper-slide">
                    <img src="uploades/profile_photo/<?= $member->avatar ?>" alt="" class="card__img">
                    <h2 class="card__title"><?= $member['first_name'] ?></h2>
                    <span class="card__text" id="descr_card"><?= $member['descr'] ?></span>
                    <div class="card__tags">
                        <?php 
                            $tags = explode(', ', $member['keywords_profile']);
                            $count_of_tag = 0;     
                            foreach ($tags as $tag) {
                                $count_of_tag += 1;
                                if ($count_of_tag != 4) {
                                ?>
                                <span class="tag"><?=$tag?></span>
                                <?php
                                 } else {
                                    echo '<span class="tag">...</span>';
                                    break;
                                }
                            }
                        ?> 
                    </div>
                    <a href="user?id=<?= $member->id ?>"><button class="card__button">Посмотреть</button></a>
                </div>

            <?php }  ?>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
    <!-- <div class="section section-contacts">
        <div class="container">
            <h2 class="section-contacts__title section__title">Мои контакты</h2>
            <div class="section-contacts__block">
                <div class="social-icon">
                    <img src="img/Mail.svg" alt="">
                </div>
                <div class="social-text">
                    <span>@john_insta</span>
                </div>
            </div>
            <div class="section-contacts__block">
                <div class="social-icon">
                    <img src="img/instagram.svg" alt="">
                </div>
                <div class="social-text">
                    <span>@john_insta</span>
                </div>
            </div>
            <div class="section-contacts__block">
                <div class="social-icon">
                    <img src="img/telegram.svg" alt="">
                </div>
                <div class="social-text">
                    <span>@john_insta</span>
                </div>
            </div>
        </div>
    </div> -->
    <form action="php/edit_avatar.php" enctype="multipart/form-data" method="POST">
            <input type="hidden" name="id_project" value=<?= $project['id_project'] ?>>        
            <input type="file" name="file" class="block-photo__file" id="file_upload" />        
            <div id="demo-modal2" class="modal modal__edit_image">
                <div class="modal__content">
                    <h1>Вы уверены, что хотите заменить вашу фотографию проекта?</h1>
                    <button class="modal__button_success" type="submit" name="edit_image_project">Да, уверен!</button>
                    <button class="modal__button_cancel cancel-action">Отмените действие</button>
                    <a class="modal__close">&times;</a>
                </div>
            </div>      
        </form>
</main>
<?php include 'footer.php' ?>
<script src="js/jquery.js"></script>
<script>
    $(document).ready(() => {
        const descr = $('.card__text').text().trim();
        
        if (descr.length >= 80) {
            $('.card__text').text(descr.slice(0, 80) + '...');
        }
    });
</script>

    <div id="demo-modal" class="modal modal-join">
        <div class="modal__content">
            <h1 class="modal__title">Заявка по вступлению в проект</h1>
            <p class="modal__subtext">
                Расскажите о себе, а также напишите, чем полезны вы могли бы быть проекту!
            </p>

            <form action="project" method="POST">
                <input type="hidden" name="creator_id" value=<?= $project['creator_id'] ?>>
                <input type="hidden" name="id_project" value=<?= $project['id_project'] ?>>
                <textarea class="modal__textarea" type="text" name="request_message" placeholder="Пишите здесь..."></textarea>
                <button class="modal__button modal__button_submit" type="submit" name="request">Отправить</button>
            </form>
            <a href="#" ><button class="modal__button modal__button_close">Отмена</button></a>


        </div>
    </div>

    <div id="success-modal" class="modal modal-join">
        <div class="modal__content">
            <h1 class="modal__title">Ваша заявка успешно была отправлена</h1>
            <a href="list_objects"><button class="modal__button" style="width: 100%; padding: 10px; margin-top: 200px;">Закрыть</button></a>

        </div>
    </div>

    
   

    <script>
        // const join_project__button = document.querySelector('.join_project__button');
        // join_project__button.addEventListener('click', () => {

        // });
    </script>

<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="js/project.js"></script>

</body>
</html>