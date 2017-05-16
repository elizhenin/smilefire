<form method="POST">
    <table style="width:100%">
        <tbody>
        <tr>
<td style="text-align: right">
    Название:
</td>
            <td style="text-align: left">
<input type="text" name="name" value="<?php if(!empty($article['name'])){echo $article['name'];}?>"/>
            </td>
        </tr>
        <tr>
            <td style="text-align: right">
                ЧПУ:
            </td>
            <td style="text-align: left">
                <input type="text" name="alias" value="<?php if(!empty($article['alias'])){echo $article['alias'];}?>"/>
            </td>
        </tr>
        <tr>
            <td style="text-align: right">
                Заголовок страницы:
            </td>
            <td style="text-align: left">
                <input type="text" name="title" value="<?php if(!empty($article['title'])){echo $article['title'];}?>"/>
            </td>
        </tr>
        <tr>
            <td style="text-align: right">
                Описание:
            </td>
            <td style="text-align: left">
                <input type="text" name="description" value="<?php if(!empty($article['description'])){echo $article['description'];}?>"/>
            </td>
        </tr>
        <tr>
            <td style="text-align: right">
                Ключевые слова:
            </td>
            <td style="text-align: left">
                <input type="text" name="keywords" value="<?php if(!empty($article['keywords'])){echo $article['keywords'];}?>"/>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <textarea class="redactor" name="text" style="width: 100%;height:300px"><?php if(!empty($article['text'])){echo $article['text'];}?></textarea>
            </td>
        </tr>
        <tr>
            <td style="text-align: right">
                Опубликовать:
            </td>
            <td style="text-align: left">
                <input type="checkbox" name="active" value="1" <?php if((!empty($article['active']))&&($article['active'])){echo 'checked';};?>/>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center">
                <input type="submit" value="Отправить">
            </td>

        </tr>
        </tbody>
    </table>
    <input type="hidden" name="operation" value="<?=$operation?>">
</form>


