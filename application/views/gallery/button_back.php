<?php
if (!($current===false)) {
    ?>
    <div class="directory_button" style="width:100%">
        <?php if($parent == 0){
        ?>
        <a href="/fotografii">
            <?php
            }else{
            ?>
            <a href="/fotografii/<?= $parent['id'] ?>_<?= $parent['alias'] ?>">
                <?php
                }
                ?>
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
<?php
}
?>