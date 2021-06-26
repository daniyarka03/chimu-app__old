<?php
    try {
        require 'php/includes/db.php';

        $id = $_GET['id'];

        if (!isset($id)) {
            header("Location: /chimu-app");
        }

        $current_user = R::findOne('users', 'id_user = ?', array($_COOKIE['id']));

        if (($current_user['id'] ?? "") == $id) {
            header("Location: profile");
        }

        $profile = R::findOne('users', 'id = ?', array($id));
        
        $id_notification = uniqid(rand(), true);
        $notifications_item = R::findAll('notifications');
        foreach ($notifications_item as $item) {
            if ($item->id_notification == $id_notification) {
                $id_notification = uniqid(rand(), true);
            }
        }

        if (isset($_POST['request'])) {
            $project_creator = filter_var(trim($_POST['creator_id']), FILTER_SANITIZE_STRING);
            $id_project = filter_var(trim($_POST['id_project']), FILTER_SANITIZE_STRING);
            $title_project = filter_var(trim($_POST['title_project']), FILTER_SANITIZE_STRING);
            $id_user = filter_var(trim($_POST['id_user']), FILTER_SANITIZE_STRING);

            $project_selected = R::load('projects', $id_project);

            $notifications = R::dispense('notifications');
            $notifications->id_notification = $id_notification;
            $notifications->id_project = $id_project;
            $notifications->text = 'Вас пригласили в проект: ' . $title_project;
            $notifications->user_sender = $_COOKIE['id'];
            $notifications->is_checked = "false";
            $notifications->user_recipient = $id_user;
            $notifications->theme = "Приглашение в проект";



            R::store($notifications);
        }
    } catch (Throwable $e) {
        echo $e;
    }
  
?>


<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/user.css" />
    <link rel="stylesheet" href="css/sidebar.css" />
    <link
      rel="stylesheet"
      href="https://unpkg.com/swiper/swiper-bundle.min.css"
    />
    <title><?=$profile['first_name']?></title>
</head>
<body>
    <!-- <h2>Profile</h2>
    <span>Name: <?= $profile->first_name ?></span> <br>
    <span>Last Name: <?= $profile->last_name ?></span> <br>
    <span>Email: <?= $profile->email ?></span> <br>
    <div class="control-panel">
        <a href="edit_profile.php" class="panel__item"><button>Update info</button></a>
        <a href="php/delete_profile.php" class="panel__item"><button>Delete account</button></a>
        <a href="php/exit.php" class="panel__item"><button>Sign out</button></a>
    </div> -->

    <?php include "php/components/sidebar.php" ?>

    <main>
        <div class="section section-basic">
            <div class="container">
                <div class="block">
                    <img src="uploades/profile_photo/<?= $profile->avatar ?>" alt="" class="section-basic__img">
                </div>
                <div class="block">
                    <h2 class="section-basic__name"><?= $profile->first_name ?> <br> <?= $profile->last_name ?></h2>
                    <span class="section-basic__date"><?= $profile->birthdate ?></span>
                    <span class="section-basic__geolocation"><?= $profile->country?></span>
                </div>
                <div class="block">
                    <a href="#demo-modal"><button class="section-basic__button">Пригласить в проект</button></a>
                </div>
            </div>
        </div>
        <div class="section section-skills">
            <div class="container">
                <h2 class="section-skills__title section__title">
                    Область деятельности
                </h2>
                <div class="section-skills__block">
                    <?php 
                        $tags = explode(', ', $profile->work_activity);
                                    
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
                    Ключевые навыки
                </h2>
                <div class="section-skills__block">
                    <?php 
                        $tags = explode(', ', $profile->keywords_profile);
                                    
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
                <h2 class="section-about__title section__title">О себе</h2>
                <p class="section-about__text" id="descr">
                    <?php
                    
                        if ($profile->descr != "") {
                            echo $profile->descr;
                        } else {
                            echo '( Пользователь еще не добавил описания о себе! )';
                        }
                    
                    ?>
                </p>
            </div>
        </section>
        <div class="section section-projects">
            <div class="container">
                <h2 class="section-projects__title section__title">Проекты пользователя</h2>
                <div class="section-projects__cards swiper-container mySwiper">
                    <div class="swiper-wrapper">
                <?php
                    $id_user = $profile->id_user;
                    $projects = R::findAll('projects', 'ORDER BY id');
                ?>
                <?php 
                
                    foreach ($projects as $project) {
                        $members = explode(',',  filter_var(trim($project['members_project']), FILTER_SANITIZE_STRING));
                        foreach ($members as $member) {
                        if ($member == $id_user) {
                ?>
                    <div class="card__block">
                        <img src="uploades/<?= $project['project_image'] ?>" alt="" class="card__img">
                        <h2 class="card__title"><?= $project->title ?></h2>
                        <span class="card__text" id="descr_card"><?= $project->descr ?></span>
                        <div class="card__tags">
                            <?php 
                                $tags = explode(', ', $project->category);
                                $count_of_tag = 0;    
                                foreach ($tags as $tag) {
                                    $count_of_tag += 1;
                                    if ($count_of_tag != 3) {
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
                        <a href="project?id=<?= $project->id ?>"><button class="card__button">Посмотреть проект</button></a>
                    </div>

                <?php }}} ?>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
        <div class="section section-contacts">
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
        </div>
    </main>
<div id="demo-modal" class="modal">
        <div class="modal__content">
        <h1>Заявка по приглашению в проект</h1>
        <p>
            Выберите проект, в который вы хотите пригласить пользователя!
        </p>
        <div class="project__cards">
        <?php
            $id_user = $_COOKIE['id'];
            $projects = R::findAll('projects', "creator_id LIKE '%$id_user%'");
            foreach($projects as $project) {
        ?>

            <div class="project__card">
                <h4><?= $project['title']?></h4>
                <span><?= $project->creator_name?></span> <br>
                <span><?= $project->category?></span> <br>
                <a href="project.php?id=<?= $project->id?>">View project</a>
                <a href="./user.php?id=<?= $_GET['id'] ?>&id_project=<?= $project->id?>#additional_modal">Select project</a>
            </div>
        <?php
            }
    ?>
        </div>
        <a href="#" class="modal__close">&times;</a>
    </div>
</div>

<div id="additional_modal" class="modal">
    <div class="modal__content">
        <?php
        $id_user = $_GET['id'];
        $user = R::load('users', $id_user);
        $selected_project = R::load('projects', $_GET['id_project']);

        ?>
        <h1>Уверены, что хотите пользователя пригласить в проект <?= $selected_project->title ?></h1>
        <p>
            Если вы уверены, то нажмите на "пригласить".
        </p>

        <form action="user.php" method="POST">
            <input type="hidden" name="creator_id" value=<?= $selected_project['creator_id'] ?>>
            <input type="hidden" name="id_project" value=<?= $selected_project['id_project'] ?>>
            <input type="hidden" name="title_project" value=<?= $selected_project['title'] ?>>
            <input type="hidden" name="id_user" value=<?= $user['id_user'] ?>>
            <button type="submit" name="request">Пригласить</button>
            <button type="submit" name="cancel_request">Отмена</button>
        </form>

        <a href="#" class="modal__close">&times;</a>
    </div>
</div>

<script>
    const join_project__button = document.querySelector('.join_project__button');
    join_project__button.addEventListener('click', () => {

    });
</script>
    <?php include 'footer.php' ?>
    <script src="js/jquery.js"></script>
    <script>

        $(document).ready(() => {
            const descr = $('#descr_card').text().trim();
            
            if (descr.length >= 80) {
                $('#descr_card').text(descr.slice(0, 80) + '...');
            }
        });
        
        
        
    </script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>

const swiper_plugin = (count_slides) => {
        var swiper = new Swiper(".mySwiper", {
        slidesPerView: count_slides,   
        spaceBetween: 30,
        loop: true,
        pagination: {
        el: ".swiper-pagination",
        clickable: true,
        },
        navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
        },
    });
    }

    if (window.innerWidth > 1179) {
        swiper_plugin(3)
    }

    if (window.innerWidth <= 1179) {
        swiper_plugin(2)
    }

    if (window.innerWidth < 897) {
        swiper_plugin(1)
    } 
</script>
<script src="js/user.js"></script>
</body>
</html>