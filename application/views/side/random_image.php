<!--noindex-->
<div><img  id="random_image" src="/css/images/blank.gif" alt=""
        style="max-width: 150px;"
        /></div>
<!--/noindex-->
<script type="text/javascript">
    function random_image_side(){

        image = new Array();
        linked = new Array();

        <?php
        $images_calc=0;
        foreach ($images as $f){
        
                echo 'image['.$images_calc.']="/images/gallery/'.$f['image'].'";';$images_calc++;
                echo "\n";
        }
        ?>

        var a=Math.round(Math.random()*<?php echo $images_calc-1;?>);
        var ni = document.getElementById('random_image');
        tempImg=new Image();
        tempImg.src=image[a];
        tempImg.onload = function(){tempImg.src = '';ni.src= image[a]; };
    };
    random_image_side();
    setInterval("random_image_side();", 10000);
</script>