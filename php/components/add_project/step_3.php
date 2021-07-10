<section class="section-add-project register__step_3">
    <div class="bootstrap_container">
        <!-- Header section -->
        <div class="section-header">
            <h2 class="section-add-project__title">Создание проекта</h2>
        </div>

        <!-- Image uploader -->
        <div class="section-forms" align="center">
            <div class="image_area">
                <label for="upload_image">
                    <img src="img/project.png" name="image" id="uploaded_image" class="img-responsive img-circle" />
                    <div class="overlay">
                        <div class="text">Нажмите, чтобы добавить фото</div>
                    </div>
                    <input type="file" name="file" class="image" id="upload_image" style="display:none" />
                </label>
            </div>
        </div>

        <!-- Section buttons -->
        <div class="section-controls">
            <button type="submit" name="submit" class="section-add-project__button_next next_2">Завершить</button>
            <button type="button" class="section-add-project__button_back back_2">Назад</button>
        </div>

        <!-- Modal crop image -->
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
</section>