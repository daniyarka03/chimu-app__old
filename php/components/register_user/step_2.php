<section class="section-register register__step_2">
    <div class="container">
        <div class="section-header">
            <h2 class="section-register__title">Основная информация</h2>
        </div>
        <div class="section-forms">
            <select name="work_activity[]" id="mselectWork" class="section-register__input require" multiple="" require>
                <?php
                $work_tags = R::findAll('TBLWorkActivity');
                foreach ($work_tags as $tag) {
                ?>
                    <option value="<?= $tag->name_tag ?>"><?= $tag->name_tag ?></option>
                <?php
                }
                ?>
            </select>
            <select name="keywords_profile[]" id="mselectKeywords" class="section-register__input require" multiple="" require>
                <optgroup label="Программирование">
                    <?php
                    $tags = R::findAll('TBLTags');

                    foreach ($tags as $tag) {
                        if ($tag->type == "prog") {

                                ?>
                                <option value="<?=$tag->name_tag?>"><?=$tag->name_tag?></option>
                                <?php

                        }
                    }

                    ?>
                </optgroup>
                <optgroup label="Дизайн">
                    <?php
                    $tags = R::findAll('TBLTags');

                    foreach ($tags as $tag) {
                        if ($tag->type == "design") {



                                ?>
                                <option value="<?=$tag->name_tag?>"><?=$tag->name_tag?></option>
                                <?php

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
            <select name="country" class="section-register__input require" id="mselectCountry">
                <option value=""></option>
                <?php
                    $countries = R::findAll('TBLCountries');
                    foreach ($countries as $country) {  
                ?>
                    <option value="<?=$country->country_name?>"><?=$country->country_name?></option>
                <?php
                    }
                ?>
            </select>
            <!-- <input type="text" name="city" class="section-register__input" placeholder="Город *" require/> -->
            <input type="date" name="birthdate" class="section-register__input require" placeholder="Дата рождения *" require/>
        </div>
        <div class="section-controls">
            <button type="button" class="section-register__button_next next_2">Далее</button>
            <button type="button" class="section-register__button_back back_2">Назад</button>
        </div>
    </div>
</section>