<!--
<form name="form_add" method="POST" style="float:left"><input
        type="hidden" name="operation" value="add"/><input type="submit" value="Добавить"/>
</form>
-->
<table style="width:100%">
    <thead style="background-color: dimgray">
   <td></td>
   <td>Заголовок</td>
   <td>Название</td>
   <td>ссылка</td>
   <td>изменен</td>
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
                <!--
                <?php
                if ($article['active'] == '1') {
                    ?>
                    <form name="form<?= $article['id'] ?>delete" method="POST" style="display:inline;float:left;"><input
                            type="hidden" name="article_id"
                            value="<?= $article['id'] ?>"/><input
                            type="hidden" name="operation" value="hide"/><input type="submit" value="Скрыть"/>
                    </form>
                <?php
                } else {
                    ?>
                    <form name="form<?= $article['id'] ?>delete" method="POST" style="display:inline;float:left;"><input
                            type="hidden" name="article_id"
                            value="<?= $article['id'] ?>"/><input
                            type="hidden" name="operation" value="show"/><input type="submit" value="Показать"/>
                    </form>
                <?php
                }
                ?>
                -->
            </td>
            <td><?= $article['title'] ?></td>
            <td><?= $article['name'] ?></td>
            <td><?= $article['alias'] ?></td>
            <td><?= $article['modificated'] ?></td>
        </tr>
    <?php
    }
    ?>
    </tbody>
</table>

