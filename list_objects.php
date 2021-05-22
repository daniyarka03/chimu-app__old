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


    $query = $_GET['query'];
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
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/list_objects.css" />
        <link rel="stylesheet" href="css/sidebar.css" />
        <title>Document</title>

    </head>

    <body>
        <?php include './php/components/sidebar.php' ?>
        <main>

            <section class="search">
                <h2 class="search__title">Поиск проектов</h2>
                <form class="search-form">
                    <img src="img/search/search.svg" alt="search__icon" class="search-form__img">
                    <input type="text" class="search-form__input" name="query" placeholder="Введите текст" />
                    <img src="img/search/filter.svg" alt="search__icon" class="search-form__img icon__filter">
                </form>
            </section>


            <section class="search-sort">
                <h2 class="search-sort__title">Сортировать</h2>
                <div class="search-sort__block">
                <?php
                    if ($e) {
                ?>

                        <a href='?query=<?= $_GET['query'] ?>&&type=id&&sort=<?= $status ?>'><input class="search-sort__btn" type="submit" value="По дате" /></a>
                        <a href='?query=<?= $_GET['query'] ?>&&type=title&&sort=<?= $status ?>'><button class="search-sort__btn" type="submit">По дате</button></a>
                        <a href='?query=<?= $_GET['query'] ?>&&type=category&&sort=<?= $status ?>'><button class="search-sort__btn" type="submit">По тегам</button></a>

                    <?php
                    } else {
                    ?>

                        <a href='?type=id&&sort=<?= $status ?>'><input class="search-sort__btn" type="submit" value="По дате" /></a>
                        <a href='?type=title&&sort=<?= $status ?>'><button class="search-sort__btn" type="submit">По алфавиту</button></a>
                        <a href='?type=category&&sort=<?= $status ?>'><button class="search-sort__btn" type="submit">По тегам</button></a>

                    <?php
                    }
                    ?>
                </div>
            </section>




            <?php
            foreach ($projects as $project) {
            ?>
                <div>
                    <h4><?= $project['title'] ?></h4>
                    <span><?= $project->creator_name ?></span> <br>
                    <span><?= $project->category ?></span> <br>
                    <a href="project.php?id=<?= $project->id ?>">View project</a>
                    <a href="update_objects.php?id=<?= $project->id ?>">Update data</a>
                    <a href="php/delete.php?id=<?= $project->id ?>">Delete data</a>
                </div>
        <?php
            }
        } catch (Throwable $e) {
            echo $e;
        }
        ?>
        </main>
    </body>

    </html>