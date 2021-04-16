
<div id="cancel_join" class="modal">
    <div class="modal__content">
        <h2><?= $data['theme'] . ': ' . $data_project->title ?></h2>

        <p>Сообщение: <?= $data['text'] ?></p>
        <p>Отправитель: <?= $user_sender['first_name'] ?></p>

        <a href="?"><button type="submit" name="cancel">Закрыть</button></a>

        <a href="?" class="modal__close">&times;</a>
    </div>
</div>

