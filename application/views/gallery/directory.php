<?=$back?>
<?php
if (!empty($items)) {
    foreach ($items as $one) {
        switch ($one['type']) {
            case 'directory':
                ?>
                <div class="directory_button" style="display:inline-block;margin:0px;padding:10px">
                    <a href="/fotografii/<?= $one['id'] ?>_<?= $one['alias'] ?>">
                        <table style="width:100%">
                            <tbody>
                            <tr>
                                <td style="text-align:right">
                                    <img class="lazy" alt="" style="max-height:200px;display: none;"
                                         data-original="/images/gallery/<?= $one['image'] ?>"/>
                                         <noscript>
                                         <img alt="" style="max-height:200px;"
                                         src="/images/gallery/<?= $one['image'] ?>"/>
                                         </noscript>
                                </td>
                                <td style="text-align:left"><?= $one['name'] ?><small><?=$one['text']?></small></td>
                            </tr>
                            </tbody>
                        </table>
                    </a>
                </div>
                <?php
                break;
            case 'alboum':
                ?>
                <div class="directory_button" style="display:inline-block;margin:0px;padding:10px">
                    <a href="/fotografii/<?= $one['id'] ?>_<?= $one['alias'] ?>">
                        <table style="width:100%">
                            <tbody>
                            <tr>
                                <td style="text-align:right"><?= $one['name'] ?><small><?=$one['text']?></small></td>
                                <td style="text-align:left">
                                    <img class="lazy" alt="" style="max-height:200px;display: none;"
                                         data-original="/images/gallery/<?= $one['image'] ?>"/>
                                         <noscript>
                                         <img alt="" style="max-height:200px;"
                                         src="/images/gallery/<?= $one['image'] ?>"/>
                                         </noscript>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </a>
                </div>
                <?php
                break;
        }
    }
}
?>
<script>
$(function() {
    $("img.lazy").show().lazyload({
    skip_invisible : false
    });
});
</script>