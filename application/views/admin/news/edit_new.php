
<form method="POST">
    <table style="width:100%">
        <tbody>

        <tr>
            <td style="text-align: right">
                Заголовок:
            </td>
            <td style="text-align: left">
                <input type="text" name="title" value="<?php if(!empty($article['title'])){echo $article['title'];}?>"/>
            </td>
        </tr>
        <tr>
            <td style="text-align: right">
                Начало показа:
            </td>
            <td style="text-align: left">
                <div id="start" class="input-append date">
                <input  type="text" name="start" value="<?php if(!empty($article['start'])){echo date("d.m.Y H:i:s",$article['start']);}?>" placeholder=""/>
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
                <input type="text" name="stop" value="<?php if(!empty($article['stop'])){echo date("d.m.Y H:i:s",$article['stop']);}?>" placeholder=""/>
                    <span class="add-on">
        <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                  </span>
                    </div>(пустое - всегда видно)
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <textarea class="redactor" name="text" style="width: 100%;height:300px"><?php if(!empty($article['text'])){echo $article['text'];}?></textarea>
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
    if($operation=='update'){
        ?>
    <input type="hidden" name="id" value="<?=$article['id']?>">
    <?php
    }
    ?>
    <input type="hidden" name="operation" value="<?=$operation?>">
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