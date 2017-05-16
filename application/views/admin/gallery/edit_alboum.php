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
<form method="POST" enctype="multipart/form-data">
    <table style="width:100%">
        <tbody>
        <tr>
            <td style="text-align: right;width: 50%">
                Заголовок:
            </td>
            <td style="text-align: left">
                <input type="text" name="name" value="<?php if (!empty($item['name'])) {
                    echo $item['name'];
                } ?>"/>
            </td>
        </tr>
        <tr>
            <td style="text-align: right">
                Начало показа:
            </td>
            <td style="text-align: left">
                <div id="start" class="input-append date">
                    <input type="text" name="start" value="<?php if (!empty($item['start'])) {
                        echo date("d.m.Y H:i:s", $item['start']);
                    } ?>" placeholder=""/>
                <span class="add-on">
        <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
      </span>
                </div>
            </td>
        </tr>
        <tr>
            <td style="text-align: right">
                Конец показа:
            </td>
            <td style="text-align: left">
                <div id="stop" class="input-append date">
                    <input type="text" name="stop" value="<?php if (!empty($item['stop'])) {
                        echo date("d.m.Y H:i:s", $item['stop']);
                    } ?>" placeholder=""/>
                    <span class="add-on">
        <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                  </span>
                </div>
                (пустое - всегда видно)
            </td>
        </tr>
          <tr>
            <td style="text-align: right;width: 50%">
                Сортировка содержимого:
            </td>
            <td style="text-align: left">
              <select name="order">
                <option value="alias:ASC" <?=($item['order']=='alias:ASC')?'selected="selected"':''?> >адрес, возрастание</option>
                <option value="alias:DESC" <?=($item['order']=='alias:DESC')?'selected="selected"':''?> >адрес, убывание</option>
                <option value="start:ASC" <?=($item['order']=='start:ASC')?'selected="selected"':''?> >начало показа, возрастание</option>
                <option value="start:DESC" <?=($item['order']=='start:DESC')?'selected="selected"':''?> >начало показа, убывание</option>
              </select>
            </td>
        </tr>
        <tr>
            <td style="text-align: right">
                <input type="file" name="image" accept="image/jpeg,image/png,image/gif">
            </td>
            <td style="text-align: left">
                <img style="max-width: 200px;max-height: 200px;"
                     src="/images/gallery/<?= $item['image'] ?>">
                <input type="hidden" name="prev_image" value="<?= $item['image'] ?>">
            </td>

        </tr>
        <tr>
           <td>
                Текст:
            </td>
            <td>
                <input type="text" name="text" value="<?=(empty($item['text']))?'':$item['text'] ?>" placeholder="Несколько слов об альбоме"/>
            </td>
        </tr>
        </tr>
        <tr>
            <td>
                Ключевые слова:
            </td>
            <td>
                <input type="text" name="keywords" value="<?=(empty($item['keywords']))?'':$item['keywords'] ?>" placeholder=""/>
            </td>
        </tr>
        <tr>
            <td>
                Описание для поисковых систем:
            </td>
            <td>
                <input type="text" name="description" value="<?=(empty($item['description']))?'':$item['description'] ?>" placeholder=""/>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center">
                <input type="submit" value="Отправить">
            </td>

        </tr>
        </tbody>
    </table>
    <?php
    if ($operation == 'update') {
        ?>
        <input type="hidden" name="id" value="<?= $item['id'] ?>">
    <?php
    }
    ?>
    <input type="hidden" name="operation" value="<?= $operation ?>">
</form>


<script type="text/javascript"
        src="/js/bootstrap.min.js">
</script>
<script type="text/javascript"
        src="/js/bootstrap-datetimepicker.min.js">
</script>
<script type="text/javascript"
        src="/js/bootstrap-datetimepicker.ru_RU.js">
</script>
<script type="text/javascript">
    $('#start').datetimepicker({
        format: 'dd.MM.yyyy hh:mm:ss',
        language: 'ru-RU'
    });
    $('#stop').datetimepicker({
        format: 'dd.MM.yyyy hh:mm:ss',
        language: 'ru-RU'
    });
</script>