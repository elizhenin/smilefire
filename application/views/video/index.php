    <hr/>
    <h1>Список видеозаписей</h1>
    <hr/>
    <table style="width:100%;padding:1px;border:0px;text-align:center; ">
        <tbody>
        <tr>
            <?php
            if (!empty($videos)) {
                $videos_count = 1;
                foreach ($videos as $video) {
                    ?>
                    <td style="text-align: center; width:50% "><a href="?video=<?=$video['id']?>">
                            <div class="alboum_button">
                                <p><?= $video['short'] ?><br/>
                                    <?php
                                    switch ($video['type']) {
                                        case  'youtube':
                                            ?><img alt="" src="//i1.ytimg.com/vi/<?= $video['video'] ?>/default.jpg"
                                                   style="width: 160px; height: 121px; " /><?php
                                            break;
                                        case 'vk':
                                            ?><img alt="" src="<?= $video['image'] ?>"
                                                   style="width: 160px; height: 121px; " /><?php
                                            break;
                                    }
                                    ?>
                                </p></div>
                        </a></td>
                    <?= (($videos_count % 2) === 0) ? '</tr><tr>' : '' ?>

                    <?php
                    $videos_count++;
                }
                if (($videos_count % 2) <> 0) {
                    ?>
                    <td colspan="2"></td><?php
                } else {
                    ?>
                    <td></td>
                <?php
                };
            }
            ?>
        </tr>
        </tbody>
    </table>