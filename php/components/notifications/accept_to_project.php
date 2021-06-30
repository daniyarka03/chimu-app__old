
<div id="accept_user" class="modal modal__accept_user">
    <div class="modal__content">
        <h2 class="modal__title"><?= $data['theme'] . ': ' . $data_project->title ?></h2>

        <p class="modal__subtext">Сообщение: <?= $data['text'] ?? "" ?></p>
        <p class="modal__subtext">Отправитель: <?= $user_sender['first_name'] ?? "" ?></p>

        <a href="./project.php?id=<?= $data_project->id ?>"><button class="modal__button" type="submit" value="ss" name="request" >Посмотреть проект</button></a>
        <a href="#" ><button class="modal__button modal__button_close">Закрыть</button></a>
                
    </div>
</div>

