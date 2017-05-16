
<form name="form_add" method="POST" enctype="multipart/form-data" style="float:left"><input
        type="hidden" name="operation" value="add"/>

    <div style="display: inline-block">
        <input type="submit" value="Добавить"/>
    </div>
    <div style="display: inline-block">
        <input type="file" name="image" accept="image/jpeg,image/png,image/gif">
    </div>
    <div style="display: inline-block">
        Название:<input type="text" name="name" style="width:50%"/>
    </div>
    <div style="display: inline-block">
        Тип:<select name="type" style="width:50%">
            <option value="directory" selected="selected">Директория</option>
            <option value="alboum">Альбом</option>
        </select>
    </div>
</form>
<br/><br/><br/><br/>
<?php
if (!empty($alias)) {
    ?>
    <div class="directory_button" style="width:100%">
        <a href="/administrator/gallery/<?= substr($alias, 0, strrpos($alias, '/')) ?>">
            <table style="width:100%;">
                <tbody>
                <tr>
                    <td style="width:50%;text-align:right">
                        <img style="height:48px;width:48px" src="/images/folder-back.png" alt=""/>
                    </td>
                    <td style="text-align:left">Назад</td>
                </tr>
                </tbody>
            </table>
        </a>
    </div>

<?php } ?>


<table style="width:100%">
    <tbody>
    <thead style="background-color: dimgray">
        <td>Тип</td>
        <td>Управление</td>
        <td>Название</td>
        <td>Обложка</td>
        <td>Начало показа</td>
        <td>Конец показа</td>
        <td>ЧПУ</td>
    </thead>
    <?php
    foreach ($items as $one) {
        ?>
        <tr>
            <td>
                <?= ($one['type'] == 'directory') ? 'Директория' : '' ?>
                <?= ($one['type'] == 'alboum') ? 'Альбом' : '' ?>
                <?= ($one['type'] == 'image') ? 'Фотография' : '' ?>
            </td>
            <td>
                <?php
                if($one['type']=='image'){
                   ?>
                    <form name="form<?= $one['id'] ?>open" method="GET" style="display:inline;float:left;"
                          action="/administrator/gallery/<?= $alias ?><?= (empty($alias)) ? '' : '/' ?><?= $one['alias'] ?>">
                        <input type="submit" value="Редактировать"/>
                    </form>
                    <?php
                }else {
                    ?>
                    <form name="form<?= $one['id'] ?>edit" method="POST" style="display:inline;float:left;"><input
                            type="hidden" name="id"
                            value="<?= $one['id'] ?>"/><input
                            type="hidden" name="operation" value="edit"/><input
                            type="hidden" name="type" value="<?= $one['type'] ?>"/><input type="submit"
                                                                                          value="Редактировать"/>
                    </form>
                    <form name="form<?= $one['id'] ?>open" method="GET" style="display:inline;float:left;"
                          action="/administrator/gallery/<?= $alias ?><?= (empty($alias)) ? '' : '/' ?><?= $one['alias'] ?>">
                        <input type="submit" value="Открыть"/>
                    </form>
                <?php
                }
                ?>

            </td>
            <td><?= $one['name'] ?></td>
            <td><img alt="" src="/images/gallery/<?= $one['image'] ?>"
                     style="width:100px;height:100px;"></td>
            <td><?= date("Y.m.d H:i:s",$one['start']) ?></td>
            <td><?=(!empty($one['stop']))? date("Y.m.d H:i:s",$one['stop']):'всегда видно' ?></td>
            <td><?= $one['alias'] ?></td>
        </tr>
    <?php
    }
    ?>
    </tbody>
</table>
