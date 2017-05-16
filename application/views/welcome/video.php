
    <h2>Случайное видео</h2>
    <p style="text-align: center; ">
        <?php
        switch ($video['type']) {
            case  'vk':
                ?>
                <iframe src="http://vk.com/video_ext.php?<?= $video['video'] ?>&amp;hd=1"
                        style="border:none;width:500px;height:400px"></iframe>
                <?php
                break;
            case 'youtube':
                ?>
                <iframe style="border:none;width:500px;height:400px"
                        src="http://www.youtube.com/embed/<?= $video['video'] ?>?rel=0" allowfullscreen></iframe>
                <?php
                break;
        }
        ?>
</p>
