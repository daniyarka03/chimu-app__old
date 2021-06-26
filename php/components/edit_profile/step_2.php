<section class="section-register register__step_2">
    <div class="container">
        <div class="section-header">
            <h2 class="section-register__title">Основная информация</h2>
        </div>
        <div class="section-forms">
        <div class="block__span">
            <span class="span">Интересующая область:</span>
            <select name="work_activity[]" id="mselectWorkEdit" class="section-register__input work_activity require" multiple="" require>
            <?php
                foreach ($work_tags as $tag) {
                    if (in_array($tag->name_tag, $work_activity_tags)) {
                        echo "<option value=$tag->name_tag selected>$tag->name_tag</option>";
                    } else {
                        echo "<option value=$tag->name_tag>$tag->name_tag</option>";
                    }
                }
                ?>
            </select>
            </div>
            <div class="block__span">
            <span class="span">Навыки:</span>
            <select name="category_object[]" id="mselectKeywordsEdit" class="section-register__input category_object require" multiple="" require>
                <optgroup label="Программирование">
                <?php
                    foreach ($tags as $tag) {
                        if ($tag->type == "prog") {
                            if (in_array($tag->name_tag, $profile_tags)) {
                              echo "<option value=$tag->name_tag selected>$tag->name_tag</option>";
                            } else {
                              echo "<option value=$tag->name_tag>$tag->name_tag</option>";
                            }
                        }
                    }
                ?>
                </optgroup>
                <optgroup label="Дизайн">
                <?php
                foreach ($tags as $tag) {
                    if ($tag->type == "design") {
                        if(in_array($tag->name_tag, $profile_tags)) {
                            echo "<option value=$tag->name_tag selected>$tag->name_tag</option>";
                        } else {
                            echo "<option value=$tag->name_tag>$tag->name_tag</option>";
                        }
                    }
                }
                ?>
                </optgroup>
                <optgroup label="Другое">
                <?php
                foreach ($tags as $tag) {
                    if ($tag->type == "" ) {
                        if(in_array($tag->name_tag, $profile_tags)) {
                            echo "<option value=$tag->name_tag selected>$tag->name_tag</option>";
                        } else {
                            echo "<option value=$tag->name_tag>$tag->name_tag</option>";
                        }
                    }
                }
                ?>
                </optgroup>
            </select>
            </div>
            <div class="block__span">
            <span class="span">Страна:</span>
            <select name="country" class="section-register__input require" id="mselectCountryEdit">
                <option value=""></option>
                <?php
                    foreach ($tagsCountry as $tag) {
                        if (in_array($tag->country_name, $profile_country)) {
                            echo "<option value=$tag->country_name selected>$tag->country_name</option>";
                        } else {
                            echo "<option value=$tag->country_name>$tag->country_name</option>";
                        }
                    }
                ?>
            </select>
                </div>
            <!-- <input type="text" name="city" class="section-register__input" placeholder="Город *" require/> -->
            <div class="block__span">
                <span class="span">Дата рождения:</span>
                <input type="date" name="birthdate" class="section-register__input require" value="<?= $profile->birthdate ?>" placeholder="Дата рождения *" require/>
            </div>
        </div>
        <div class="section-controls">
            <button type="button" class="section-register__button_next next_2">Далее</button>
            <button type="button" class="section-register__button_back back_2">Назад</button>
        </div>
    </div>
</section>