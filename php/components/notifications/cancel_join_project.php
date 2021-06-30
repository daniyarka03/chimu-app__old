
<div id="cancel_join" class="modal modal_cancel">
    <div class="modal__content">
        <h2 class="modal__title"><?= $data['theme'] . ': ' . $data_project->title ?></h2>
        
        <p class="modal__subtext">Отправитель: <?= $user_sender['first_name'] ?></p>
        <p class="modal__subtext">Сообщение: <br/><?= $data['text'] ?></p>

        <a href="#" ><button class="modal__button modal__button_close">Закрыть</button></a>
                
    </div>
</div>

