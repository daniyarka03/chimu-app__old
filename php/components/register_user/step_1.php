<!-- Step 1 -->
<section class="section-register register__step_1">
    <div class="container">
        <div class="section-header">
            <h2 class="section-register__title">Регистрация</h2>
        </div>
        <div class="section-forms">
            <input type="text" class="section-register__input require" name="firstname" value="<?php @$_POST['firstname'] ?>" placeholder="Имя *" require />
            <input type="text" class="section-register__input require" name="lastname" value="<?php @$_POST['lastname'] ?>" placeholder="Фамилия *" require />
            <input type="email" class="section-register__input require" name="email" value="<?php @$_POST['email'] ?>" placeholder="Эл. почта *" require />
            <input type="password" class="section-register__input require" name="password" value="<?php @$_POST['password'] ?>" placeholder="Пароль *" require />
            <input type="password" class="section-register__input require" name="password_2" value="<?php @$_POST['password_2'] ?>" placeholder="Повторите пароль *" require  />
        </div>
        <div class="section-controls">
            <button type="button" class="section-register__button_next next_1">Далее</button>
            <a href="login" class="section-register__button_login">Есть уже аккаунт? Войти</a>
        </div>
    </div>
</section>