<?php
    try {
        require "php/includes/db.php";

        if (isset($_GET['type'])) {
            $type = $_GET['type'];
        } else {
            $type = 'id';
        }

        if (isset($_GET['sort'])) {
            $status = $_GET['sort'];
        } else {
            $status = 'DESC';
        }


        $query = $_GET['query'] ?? "";
        if (isset($_GET['query'])) {
            $projects = R::findAll('projects', "title LIKE '%$query%'");
            if (isset($_GET['type'])) {
                $projects = R::findAll('projects', ("title LIKE '%$query%' ORDER BY " . $type . ' ' . $status));
            }
        } else {
            $projects = R::findAll('projects', ('ORDER BY ' . $type . ' ' . $status));
        }
        $id = $_COOKIE['id'];

        $status == 'DESC' ? $status = 'ASC' : $status = 'DESC';


        $test = str_split($_SERVER['REQUEST_URI']);
        $e = array_search('q', $test);
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/list_objects.css" />
    <link rel="stylesheet" href="css/sidebar.css" />
    <title>Search projects</title>
</head>

<body>
    <?php include './php/components/sidebar.php' ?>
    <main>
        <!-- Поисковая форма -->
        <section class="search">
            <h2 class="search__title">Поиск проектов</h2>
            <form class="search-form">  
                <div class="search-form__block">
                    <input type="text" class="search-form__input" value="<?= $_GET['query'] ?? "" ?>" name="query" placeholder="Введите текст" />
                    <!-- <img src="img/search/filter.svg" alt="search__icon" class="search-form__img icon__filter"> -->
                </div>
                <input type="submit" value="Поиск" class="search-form__button" />
            </form>
            <a href="list_users"><button class="search__button_users">Поиск пользователей</button></a>
        </section>

        <!-- Сортировка списка -->
        <section class="search-sort">
            <h2 class="search-sort__title">Сортировать</h2>
            <div class="search-sort__block">
                <?php
                    if ($e) {
                    ?>

                <a href='?query=<?= $_GET['query'] ?>&&type=id&&sort=<?= $status ?>'><button class="search-sort__btn"
                        type="submit">По дате <img class="search-sort__status" src="img/search/Forward.svg" />
                    </button></a>
                <a href='?query=<?= $_GET['query'] ?>&&type=title&&sort=<?= $status ?>'><button class="search-sort__btn"
                        type="submit">По алфавиту <img class="search-sort__status" src="img/search/Forward.svg" />
                    </button></a>
                <a href='?query=<?= $_GET['query'] ?>&&type=category&&sort=<?= $status ?>'><button
                        class="search-sort__btn" type="submit">По тегам <img class="search-sort__status"
                            src="img/search/Forward.svg" /> </button></a>

                <?php
                    } else {
                    ?>

                <a href='?type=id&&sort=<?= $status ?>'><button class="search-sort__btn" type="submit"
                        value="По дате">По дате <img class="search-sort__status"
                            src="img/search/Forward.svg" /></button></a>
                <a href='?type=title&&sort=<?= $status ?>'><button class="search-sort__btn" type="submit">По алфавиту
                        <img class="search-sort__status" src="img/search/Forward.svg" /></button></a>
                <a href='?type=category&&sort=<?= $status ?>'><button class="search-sort__btn" type="submit">По тегам
                        <img class="search-sort__status" src="img/search/Forward.svg" /></button></a>

                <?php
                    }
                    ?>
            </div>
        </section>

        <!-- Отображение списка запроса -->
        <?php
            foreach ($projects as $project) {
            ?>

        <section class="section section-card">
            <div class="container">
                <div class="section-card__content">
                    <img src="uploades/<?= $project['project_image'] ?>" alt="logo" class="section-card__img">
                    <div class="content__text">
                        <h2 class="section-card__title"><?= $project['title'] ?></h2>
                        <span class="section-card__description" id="descr_card"><?= $project['descr'] ?></span>
                    </div>
                    <div class="content__tags">
                        <div class="block">
                            <?php

                                    $tags = explode(', ', $project->category);
                                    
                                    $count_of_tag = 0;

                                    foreach ($tags as $tag) {
                                        $count_of_tag += 1;
                                        if ($count_of_tag != 3) {
                                        ?>
                                        
                                        <span class="section-card__tag"><?=$tag?></span>
                                        <?php
                                        } else {
                                            echo '<span class="section-card__tag">...</span>';
                                            break;
                                        }
                                    }

                                    ?>

                        </div>
                    </div>
                </div>
                <div class="section-card__controls">
                    <?php if ($project['creator_id'] == $_COOKIE['id']) echo '<a href="update_objects.php?id='.$project->id.'"><button class="section-card__button-join">Редактировать</button></a>' ?>
                    <?php if ($project['creator_id'] != $_COOKIE['id']) echo '<a href="project?id='.$project->id.'#demo-modal"><button class="section-card__button-join">Вступить</button></a>' ?>
                    <a href="project?id=<?= $project->id ?>"><button class="section-card__button-view">Посмотреть
                            проект</button></a>
                    <span class="section-card__date"></span>
                </div>
            </div>
        </section>
        <?php
            }
        } catch (Throwable $e) {
            echo $e;
        }
        ?>
    </main>
</body>
<?php include 'footer.php'; ?>
<script src="js/jquery.js"></script>
<script>
    const button = document.querySelectorAll('.search-sort__btn');
    const icon_status = document.querySelectorAll('.search-sort__status');
    const descr = document.querySelectorAll('.section-card__description');


    if (location.toString().indexOf('id') !== -1) {
        icon_status[0].style.display = 'block';
        button[0].style.background = "#fff";
        button[0].style.color = "#8075FF";
        if (location.toString().indexOf('ASC') !== -1) {
            icon_status[0].style.transform = 'rotateY(0deg)';
            icon_status[0].style.paddingRight = '20px';
        }

        if (location.toString().indexOf('DESC') !== -1) {
            icon_status[0].style.transform = '';
            icon_status[0].style.paddingRight = '20px';
        }
    }

    if (location.toString().indexOf('title') !== -1) {
        icon_status[1].style.display = 'block';
        button[1].style.background = "#fff";
        button[1].style.color = "#8075FF";
        button[1].style.paddingLeft = "20px";
        if (location.toString().indexOf('ASC') !== -1) {
            icon_status[1].style.transform = 'rotateY(0deg)';
            icon_status[1].style.paddingRight = '20px';
        }

        if (location.toString().indexOf('DESC') !== -1) {
            icon_status[1].style.transform = '';
            icon_status[1].style.paddingRight = '20px';
        }
    }

    if (location.toString().indexOf('category') !== -1) {
        icon_status[2].style.display = 'block';
        button[2].style.background = "#fff";
        button[2].style.color = "#8075FF";
        if (location.toString().indexOf('ASC') !== -1) {
            icon_status[2].style.transform = 'rotateY(0deg)';
            icon_status[2].style.paddingRight = '20px';
        }

        if (location.toString().indexOf('DESC') !== -1) {
            icon_status[2].style.transform = '';
            icon_status[2].style.paddingRight = '20px';
        }
    }

    $(document).ready(() => {
        const descr = $('#descr_card').text().trim();

        if (descr.length >= 400) {
            $('#descr_card').text(descr.slice(0, 80) + '...');
        }
    });
</script>

</html>