<?php foreach($items as $one){ ?>
    <a href="/novosti/<?php echo $one['alias'] ?>" style="color: #fbb450">
<div style="width:100%;margin-top:10px;">
    <div style="text-align:left;font-size:12pt">
            <?= $one['title'] ?>
    </div>
    <div style="text-align:left;font-size:10pt">
        <?php
        $one['text'] = preg_replace("/<.*?>/", " ", $one['text']); // вырезаем теги
        echo $one['text'];
        ?>
    </div>
    <div style="text-align:right;font-size:8pt;">Опубликовано&nbsp;в&nbsp;<?= date('H:i  d.m.Y', $one['start']) ?>
    </div>
</div>
    </a>
<?php } ?>
