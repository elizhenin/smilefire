<h2><?=$video['full']?></h2><hr />
<p style="text-align: center; ">
    <?php
    switch($video['type']){
    case  'vk':
        ?>
    <iframe src="http://vk.com/video_ext.php?<?=$video['video']?>&amp;hd=1" style="border:none;width:500px;height:400px"></iframe>
    <?php
    break;
case 'youtube':
?>
  <iframe style="border:none;width:500px;height:400px" src="http://www.youtube.com/embed/<?=$video['video']?>?rel=0" allowfullscreen></iframe>
    <?php
    break;
    }
?>
</p><hr />
<?=$video['comment']?><br/>

<a href="<?=$back?>">
    <div class="directory_button" style="width:100%">
        <table style="width:100%">
            <tbody>
            <tr>
                <td style="width:50%;text-align:right">
                    <img style="height:48px;width:48px" src="images/folder-back.png" alt=""/>
                </td>
                <td style="text-align:left">
                    Назад
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</a>
