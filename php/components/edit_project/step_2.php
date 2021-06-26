<section class="section-add-project register__step_2">
    <div class="container">
        <div class="section-header">
            <h2 class="section-add-project__title">Создание проекта</h2>
        </div>
        <div class="section-forms">
            <div class="block__span">
                <span class="span">Кто нужен в проект:</span>
            <select name="keywords_need_users[]" id="mselectKeywordsProject" class="section-add-project__input keywords_need_users require" multiple="" require>
                <optgroup label="Программирование">
                <?php
                    $tags = R::findAll('TBLTags');

                    foreach ($tags as $tag) {
                        if ($tag->type == "prog") {
                            if(in_array($tag->name_tag, $project_keywords_need_users)) {
                                ?>
                                <option value="<?=$tag->name_tag?>" selected><?=$tag->name_tag?></option>
                                <?php
                            } else {
                                ?>
                                <option value="<?=$tag->name_tag?>"><?=$tag->name_tag?></option>
                                <?php
                            }
                        }
                    }

                    ?>
                </optgroup>
                <optgroup label="Дизайн">
                <?php
                    $tags = R::findAll('TBLTags');

                    foreach ($tags as $tag) {
                        if ($tag->type == "design") {
                            if(in_array($tag->name_tag, $project_keywords_need_users)) {
                                ?>
                                <option value="<?=$tag->name_tag?>" selected><?=$tag->name_tag?></option>
                                <?php
                            } else {
                                ?>
                                <option value="<?=$tag->name_tag?>"><?=$tag->name_tag?></option>
                                <?php
                            }
                        }
                    }

                    ?>
                </optgroup>
                <optgroup label="Другое">
                    <?php
                    $tags = R::findAll('TBLTags');

                    foreach ($tags as $tag) {
                        if ($tag->type == "" ) {


                                ?>
                                <option value="<?=$tag->name_tag?>"><?=$tag->name_tag?></option>
                                <?php
                            }

                    }

                    ?>
                </optgroup>
            </select>
                </div>
            <input type="text" name="instagram" class="section-add-project__input" placeholder="Instagram" require/>
            <input type="text" name="telegram" class="section-add-project__input" placeholder="Telegram" require/>
        </div>
        <div class="section-controls">
            <button type="button" class="section-add-project__button_next next_2">Далее</button>
            <button type="button" class="section-add-project__button_back back_2">Назад</button>
        </div>
    </div>
</section>