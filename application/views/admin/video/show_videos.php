<form name="form_add" method="POST" style="float:left"><input
        type="hidden" name="operation" value="add"/><input type="submit" value="Добавить"/>
</form>
<h1>Список Видео</h1>
<hr>
<table style="width:100%">
    <thead style="background-color: dimgray">
   <td></td>
   <td>Заголовок</td>
   <td>Описание</td>
   <td>Обложка</td>
   <td>Тип</td>
   <td>Активен</td>
    </thead>
    <tbody>
    <?php
    foreach ($videos as $video) {
        ?>
        <tr>
            <td>

                <form name="form<?= $video['id'] ?>edit" method="POST" style="display:inline;float:left;"><input
                        type="hidden" name="video_id"
                        value="<?= $video['id'] ?>"/><input
                        type="hidden" name="operation" value="edit"/><input type="submit" value="Редактировать"/>
                </form>
            </td>
            <td><?= $video['short'] ?></td>
            <td><?= $video['full'] ?></td>
            <td><?=(empty($video['image']))?'<img src="//i1.ytimg.com/vi/'.$video['video'].'/default.jpg" style="width:100px;height:100px;" />':'<img src="'.$video['image'].'" style="width:100px;height:100px;"/>'?>
                </td>
            <td><?= $video['type'] ?></td>
            <td>
                <form method="post">
                    <input type="hidden" name="id" value="<?= $video['id'] ?>">
                    <input type="hidden" name="operation" value="<?=(empty($video['active']))?'enable':'disable'?>"/>
                    <input type="submit" value="<?=(empty($video['active']))?'&#10008;':'&#10004;'?>">
                </form>
            </td>
        </tr>
    <?php
    }
    ?>
    </tbody>
</table>

