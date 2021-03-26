<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/multiselect_plugin/chosen.min.css">
    <title>Document</title>
</head>
<body>
    <?php

        require "./php/includes/db.php";

        $id = $_GET['id'];
        $project = R::load('projects', $id);

        $project_category = explode(', ', $project['category']);

        $size = sizeof($project_category);


    foreach ($project_category as $item) {
        echo '<li class="search-choice"><span>111</span><a class="search-choice-close" data-option-array-index="2"></a></li>';
    }


    ?>

    <h2>Изменение объекта: <?= $project['title'] ?></h2>
    <form action="./php/update_object.php" method="post">
        <input type="hidden" name="id" value="<?= $id?>"/>
        <div class="form-block">
            <span></span>
            <input type="text" placeholder="Название" name="title_object" value="<?= $project['title'] ?>">
        </div>
        <br>
        <div class="form-block">
            <select data-placeholder="Выберите теги..." name="category_object[]" id="mselect" multiple="" style="width: 300px;">
                <optgroup label="Программирование">
                    <option value="#iOS">#iOS</option>
                    <option value="#Java">#Java</option>
                    <option value="#PHP" selected>#PHP</option>
                </optgroup>
            </select>
        </div>
        <br>
        <div class="form-block">
            <input type="submit" value="Изменить">
        </div>
    </form>
    <script src="js/jquery.js"></script>
    <script src="js/multiselect_plugin/chosen.jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#mselect').chosen();
        });
    </script>
</body>
</html>