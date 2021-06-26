<!-- Step 1 -->
<section class="section-add-project add-project__step_1">
    <div class="container">
    <input type="hidden" name="id" value="<?= $id?>"/>
        <div class="section-header">
            <h2 class="section-add-project__title">Создание проекта</h2>
        </div>
        <div class="section-forms">
            <input type="text" class="section-add-project__input require" name="title_object" value="<?= $project['title'] ?>" placeholder="Название проекта *" require />
            <div class="block__span">
                <span class="span">Область проекта:</span>
                <select name="category_object[]" id="mselectArea" class="section-add-project__input category_object require" multiple="" require>
                    <?php


                        $work_tags = R::findAll('TBLWorkActivity');



                            foreach ($work_tags as $tag) {

                                if(in_array($tag->name_tag, $project_category)) {
                                    ?>
                                    <option value="<?=$tag->name_tag?>" selected><?=$tag->name_tag?></option>
                                    <?php
                                } else {
                                    ?>
                                    <option value="<?=$tag->name_tag?>"><?=$tag->name_tag?></option>
                                    <?php
                                }

                            }

                    ?>
                </select>
            </div>
            <!-- <input type="email" class="section-add-project__input require" name="email" value="<?php @$_POST['email'] ?>" placeholder="Эл. почта *" require /> -->
            <textarea class="section-add-project__description" name="descr"  placeholder="Описание проекта"><?= $project->descr ?></textarea>
        </div>
        <div class="section-controls">
            <button type="button" class="section-add-project__button_next next_1">Далее</button>
            <a href="project?id=<?= $_GET['id'] ?>" class="section-add-project__button_login">Отмена</a>
        </div>
    </div>
</section>