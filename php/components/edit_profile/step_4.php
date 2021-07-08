<!-- Step 4 -->
<section class="section-register register__step_4">
    <div class="container">
        <div class="section-header">
            <h2 class="section-register__title">О себе</h2>
        </div>
        <div class="section-forms">
            <textarea class="section-register__description" maxlength="900" name="descr" placeholder="О себе (Необязательно)"><?= $profile->descr ?></textarea>
        </div>
        <div class="section-controls">
            <button type="submit" class="section-register__button_next next_4" value="register" name="do_signup">Завершить</button>
            <button type="button" class="section-register__button_back back_4">Назад</button>
        </div>
    </div>
</section>
