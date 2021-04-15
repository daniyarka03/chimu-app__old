<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/multiselect_plugin/chosen.min.css">
    <title>Add object</title>
    <style>
        .form-block {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h2>Добавление нового объекта</h2>
    <form action="php/add_object.php" method="POST">
        <div class="form-block">
            <span></span>
            <input type="text" placeholder="Название" name="title_object" class="input_form">
        </div>
        <div class="form-block">
            <select name="category_object[]" id="mselect" multiple="" style="width: 300px;">
                <optgroup label="Программирование">
                    <?php
                        require 'php/includes/db.php';

                        $tags = R::findAll('TBLTags');



                        foreach ($tags as $tag) {
                            ?>
                            <option value="<?=$tag->name_tag?>"><?=$tag->name_tag?></option>
                            <?php
                        }

                    ?>
                </optgroup>
            </select>
        </div>
        <div class="form-block">
            <input type="submit" value="Создать" id="submit">
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