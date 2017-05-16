<hr />
<h1>Фото галерея</h1>
<hr />
<?=$content?>

<script type="text/javascript">
    function alboums_show (num) {
        //все выключаем
        for (i=0;i<=<?php echo $alboums_count; ?>;i++){
            $("div.foto"+(i+'')+"_content").hide();
            $("div.foto"+(i+'')+"_list").hide();
        }
        //включаем альбом
        //$("div.foto"+(num+'')+"_content").css("display","block");
        $("div.foto"+(num+'')+"_content").fadeIn(200, function(){});
        //меняем url
        if(num>0){window.history.pushState(null, null, 'fotografii?alboum='+num);}
        else{window.history.pushState(null, null, 'fotografii');}
    }
    <?php
    $start_alboum='0';
    if(!empty($_GET['alboum'])){$start_alboum=$_GET['alboum'];}
    ?>
    alboums_show(<?php echo $start_alboum;?>);
</script>