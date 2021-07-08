<section class="section-register register__step_2">
    <div class="container">
        <div class="section-header">
            <h2 class="section-register__title">Основная информация</h2>
        </div>
        <div class="section-forms">
            <div class="block__span">
                <span class="span">Интересующая область: *</span>
                <select name="work_activity[]" id="mselectWork" class="section-register__input work_activity require" multiple="" require>
                    <?php
                    $work_tags = R::findAll('tblworkactivity');
                    foreach ($work_tags as $tag) {
                    ?>
                        <option value="<?= $tag->name_tag ?>"><?= $tag->name_tag ?></option>
                    <?php
                    }
                    ?>
                </select>
                <span class="section-register__error_message error_message_step_2" id="error_message_work_activity"></span>    
            
            </div>
            <div class="block__span">
                <span class="span">Навыки: *</span>
                <select name="keywords_profile[]" id="mselectKeywords" class="section-register__input keywords_profile require" multiple="" require>
                    <optgroup label="Программирование">
                        <?php
                        $tags = R::findAll('tbltags');

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
                        $tags = R::findAll('tbltags');

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
                        $tags = R::findAll('tbltags');

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
                <span class="section-register__error_message error_message_step_2" id="error_message_keywords_profile"></span>    
            
            </div>
            <div class="block__span">
                <span class="span">Страна: *</span>
                <select name="country" class="section-register__input require" id="mselectCountry">
                    <option value="">Выберите</option>
                    <?php
                        $countries = R::findAll('tblcountries');
                        foreach ($countries as $country) {  
                    ?>
                        <option value="<?=$country->country_name?>"><?=$country->country_name?></option>
                    <?php
                        }
                    ?>
                </select>
                <span class="section-register__error_message error_message_step_2" id="error_message_country"></span>    
            
            </div>
            <!-- <input type="text" name="city" class="section-register__input" placeholder="Город *" require/> -->
            <div class="block__span">
                <span class="span">Дата рождения: *</span>
                <input type="date" name="birthdate" class="section-register__input require" placeholder="Дата рождения *" require/>
                <span class="section-register__error_message error_message_step_2" id="error_message_country"></span>    
                
            </div>  
                      
            </div>
        <div class="section-controls">
            <button type="button" class="section-register__button_next next_2">Далее</button>
            <button type="button" class="section-register__button_back back_2">Назад</button>
        </div>
    </div>
</section>