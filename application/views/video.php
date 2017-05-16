<div style="text-align: center;">
<?=$content?>
</div>
<script type="text/javascript">
    function videos_show (num) {
        //все выключаем
        for (i=0;i<=<?php echo $videos_count; ?>;i++){
            $("div.video"+(i+'')+"_content").hide();
        }
        //включаем видео
        //$("div.video"+(num+'')+"_content").css("display","block");
        $("div.video"+(num+'')+"_content").fadeIn(200, function(){});
        //меняем url
        if(num>0){window.history.pushState(null, null, 'videozapisi?video='+num);}
    }
    <?php
    $start_video='0';
    if(!empty($_GET['video'])){$start_video=$_GET['video'];}
    ?>
    videos_show(<?php echo $start_video;?>);
</script>