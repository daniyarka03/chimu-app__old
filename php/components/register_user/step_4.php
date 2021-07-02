<!-- Step 4 -->
<section class="section-register register__step_4 bootstrap_container">
    <div class="container">
        <div class="section-header">
            <h2 class="section-register__title">О себе</h2>
        </div>
        <div class="section-forms container" align="center">
            <!-- <label for="file_upload" class="section-register__file_block">
                <label class="section-register__label_text" for="file_upload">Добавить <br> фото (Необязательно)</label>
                <input type="file" name="file" class="section-register__input" id="file_upload" />
            </label> -->
            <div class="bootstrap_container">

                <div class="image_area">
                    <label for="upload_image">
                        <img src="uploades/113625177760dee0a3c2a0c4.04073064.png" name="file" id="uploaded_image"
                            class="img-responsive img-circle" />
                        <div class="overlay">
                            <div class="text">Click to Change Profile Image</div>
                        </div>
                        <input type="file" name="image" class="image" id="upload_image" style="display:none" />
                    </label>
                </div>
            </div>
            <textarea class="section-register__description" maxlength="900" name="descr"
                placeholder="О себе (Необязательно)"></textarea>
        </div>
        <div class="section-controls">
            <button type="submit" class="section-register__button_next next_4" value="register"
                name="do_signup">Завершить</button>
            <button type="button" class="section-register__button_back back_4">Назад</button>
        </div>

        
    </div>
    </div>
</section>