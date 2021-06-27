<!-- Step 1 -->
<section class="section-register register__step_1">
    <div class="container">
        <div class="section-header">
            <h2 class="section-register__title">Регистрация</h2>
        </div>
        <div class="section-forms">
            <input type="text" class="section-register__input require_step_1" name="firstname" value="<?php @$_POST['firstname'] ?>" placeholder="Имя *" require />
            <span class="section-register__error_message error_message_step_1" id="error_message_firstname"></span>    
            
            <input type="text" class="section-register__input require_step_1" name="lastname" value="<?php @$_POST['lastname'] ?>" placeholder="Фамилия *" require />
            <span class="section-register__error_message error_message_step_1" id="error_message_lastname"></span>    
            
            <input type="email" class="section-register__input email require_step_1" name="email" value="<?php @$_POST['email'] ?>" placeholder="Эл. почта *" require />
            <span class="section-register__error_message error_message_step_1" id="error_message_email"></span>    
            
            <input type="password" class="section-register__input require_step_1" name="password" value="<?php @$_POST['password'] ?>" placeholder="Пароль *" require />
            <span class="section-register__error_message error_message_step_1" id="error_message_password"></span>
            
            <input type="password" class="section-register__input require_step_1" name="password_2" value="<?php @$_POST['password_2'] ?>" placeholder="Повторите пароль *" require  />
            <span class="section-register__error_message error_message_step_1" id="error_message_confirm_password"></span>
        </div>
        <div class="section-controls">
            <button type="button" class="section-register__button_next next_1">Далее</button>
            <a href="login" class="section-register__button_login">Есть уже аккаунт? Войти</a>
        </div>
    </div>
</section>