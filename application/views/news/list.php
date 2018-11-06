<?php foreach($VisibleNews as $one){ ?>

<div id="id<?php echo $one['start']; ?>" class="news_one" style="width:100%;margin-top:10px;">
    <div style="text-align:left;">
        <h2>
            <img alt="" style="max-height:30px" src="/css/images/li-bullet-red.png"/>
            <a href="/novosti/<?php echo $one['alias'] ?>"><?php echo $one['title'] ?></a>
        </h2>
    </div>
    <div id="content_'<?php echo $one['start'] ?>" style="text-align:left;font-size:12pt">
        <?php echo htmlspecialchars_decode($one['text']) ?>
    </div>
    <div style="text-align:right;font-size:10pt;">Опубликовано&nbsp;в&nbsp;<?php echo date('H:i  d.m.Y', $one['start']); ?>
    </div>
</div>

<?php } ?>
