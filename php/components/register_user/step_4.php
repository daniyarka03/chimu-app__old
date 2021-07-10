<!-- Step 4 -->
<section class="section-register register__step_4">
    <div class="bootstrap_container">
        <!-- Header -->
        <div class="section-header">
            <h2 class="section-register__title">О себе</h2>
        </div>

        <!-- Block image uploader -->
        <div class="section-forms" align="center">
            <div class="image_area">
                <label for="upload_image">
                    <img src="img/user.png" name="image" id="uploaded_image" class="img-responsive img-circle" />
                    <div class="overlay">
                        <div class="text">Нажмите, чтобы добавить фото</div>
                    </div>
                    <input type="file" name="file" class="image" id="upload_image" style="display:none" />
                </label>
            </div>
            <textarea class="section-register__description" maxlength="900" name="descr" placeholder="О себе (Необязательно)"></textarea>
        </div>
        <div class="section-controls">
            <button type="submit" class="section-register__button_next next_4" value="register" name="do_signup">Завершить</button>
            <button type="button" class="section-register__button_back back_4">Назад</button>
        </div>


        <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Crop Image Before Upload</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="img-container">
                            <div class="row">
                                <div class="col-md-8">
                                    <img src="" id="sample_image" />
                                </div>
                                <div class="col-md-4">
                                    <div class="preview"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="crop" class="btn btn-primary">Crop</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</section>