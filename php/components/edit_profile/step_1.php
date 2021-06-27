<!-- Step 1 -->
<section class="section-register register__step_1">
    <div class="container">
        <div class="section-header">
            <h2 class="section-register__title">Изменение профиля</h2>
        </div>
        <div class="section-forms">
            <input type="text" class="section-register__input require_step_1" name="firstname" value="<?=$profile->first_name?>" placeholder="Имя *" require />
            <span class="section-register__error_message error_message_step_1" id="error_message_firstname"></span>    
            
            <input type="text" class="section-register__input require_step_1" name="lastname" value="<?=$profile->last_name?>" placeholder="Фамилия *" require />
            <span class="section-register__error_message error_message_step_1" id="error_message_lastname"></span>    
            
            <input type="email" class="section-register__input email require_step_1" name="email" value="<?=$profile->email  ?>" placeholder="Эл. почта *" require />
            <span class="section-register__error_message error_message_step_1" id="error_message_email"></span>    
            
        </div>
        <div class="section-controls">
            <button type="button" class="section-register__button_next next_1">Далее</button>
            <a href="profile" class="section-register__button_login">Отмена</a>
        </div>
    </div>
</section>