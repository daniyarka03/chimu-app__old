<!-- Step 1 -->
<section class="section-add-project add-project__step_1">
    <div class="container">
        <div class="section-header">
            <h2 class="section-add-project__title">Создание проекта</h2>
        </div>
        <div class="section-forms">
            
            <input type="text" class="section-add-project__input require" name="title_object" value="<?php @$_POST['firstname'] ?>" placeholder="Название проекта *" require />
            <div class="block__span">
            <span class="span">Область проекта:</span>
            <select name="category_object[]" id="mSelectArea" class="section-add-project__input category_object require" multiple="" require>
                <?php
                $work_tags = R::findAll('TBLWorkActivity');
                foreach ($work_tags as $tag) {
                ?>
                    <option value="<?= $tag->name_tag ?>"><?= $tag->name_tag ?></option>
                <?php
                }
                ?>
            </select>
            </div>
            <!-- <input type="email" class="section-add-project__input require" name="email" value="<?php @$_POST['email'] ?>" placeholder="Эл. почта *" require /> -->
            <textarea class="section-add-project__description" name="descr" placeholder="Описание проекта"></textarea>
        </div>
        <div class="section-controls">
            <button type="button" class="section-add-project__button_next next_1">Далее</button>
            <a href="profile" class="section-add-project__button_login">Отмена</a>
        </div>
    </div>
</section>