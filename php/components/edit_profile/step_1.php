<!-- Step 1 -->
<section class="section-register register__step_1">
    <div class="container">
        <div class="section-header">
            <h2 class="section-register__title">Изменение профиля</h2>
        </div>
        <div class="section-forms">
            <input type="text" class="section-register__input require" name="firstname" value="<?=$profile->first_name?>" placeholder="Имя *" require />
            <input type="text" class="section-register__input require" name="lastname" value="<?=$profile->last_name?>" placeholder="Фамилия *" require />
            <input type="email" class="section-register__input require" name="email" value="<?=$profile->email  ?>" placeholder="Эл. почта *" require />
        </div>
        <div class="section-controls">
            <button type="button" class="section-register__button_next next_1">Далее</button>
            <a href="profile" class="section-register__button_login">Отмена</a>
        </div>
    </div>
</section>