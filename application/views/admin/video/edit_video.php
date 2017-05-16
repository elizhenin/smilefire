<?php
if(empty($video['short'])){$video['short']='';}
if(empty($video['full'])){$video['full']='';}
if(empty($video['type'])){$video['type']='';}
if(empty($video['video'])){$video['video']='';}
if(empty($video['image'])){$video['image']='';}
if(empty($video['comment'])){$video['comment']='';}
?>
<form method="POST">
    <label>Короткое название:<br>
        <input type="text" name="short" value="<?=$video['short']?>" style="width: 50%"></label><br>
    <label>Полное название:<br>
    <textarea rows="6" name="full" style="width: 50%"><?=$video['full']?></textarea></label>
    <hr><label>Тип видео:
    <select name="type">
        <option value="youtube" <?=($video['type']=='youtube')?'selected="selected"':''?>>YouTube</option>
        <option value="vk" <?=($video['type']=='vk')?'selected="selected"':''?>>ВКонтакте</option>
    </select></label>
    <label>ID записи:<input type="text" name="video" value="<?=$video['video']?>" style="width: 50%"></label><br>
    <label>Обложка:<input type="text" name="image" value="<?=$video['image']?>" style="width: 50%">(для YouTube оставить пустым)</label>
    <hr>
    <label>Комментарий(под видео):<br>
    <textarea rows="6" name="comment" style="width: 50%"><?=$video['comment']?></textarea></label>


    <?php
    if($operation=='update'){
        ?>
    <input type="hidden" name="id" value="<?=$video['id']?>">
    <?php
    }
    ?>
    <input type="hidden" name="operation" value="<?=$operation?>">
    <input type="submit" value="Сохранить">
</form>