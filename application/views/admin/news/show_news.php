<form name="form_add" method="POST" style="float:left"><input
        type="hidden" name="operation" value="add"/><input type="submit" value="Добавить"/>
</form>
<form name="form_regen" method="POST" style="float:right"><input
        type="hidden" name="operation" value="regen"/><input type="submit" value="Исправить пути"/>
</form>
<h1>Список новостей</h1>
<hr>
<table style="width:100%">
    <thead style="background-color: dimgray">
   <td></td>
   <td>Заголовок</td>
   <td>Начало показа</td>
   <td>Конец показа</td>
    </thead>
    <tbody>
    <?php
    foreach ($articles as $article) {
        ?>
        <tr>
            <td>

                <form name="form<?= $article['id'] ?>edit" method="POST" style="display:inline;float:left;"><input
                        type="hidden" name="article_id"
                        value="<?= $article['id'] ?>"/><input
                        type="hidden" name="operation" value="edit"/><input type="submit" value="Редактировать"/>
                </form>
            </td>
            <td><?= $article['title'] ?></td>
            <td><?= date("Y.m.d H:i:s",$article['start']) ?></td>
            <td><?=(!empty($article['stop']))? date("Y.m.d H:i:s",$article['stop']):'всегда видно' ?></td>

        </tr>
    <?php
    }
    ?>
    </tbody>
</table>

