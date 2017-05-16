<?php
if (!empty($items)) {
    foreach ($items as $one) {
        ?>
                <div class="directory_button" style="display:inline-block;margin:0px;padding:10px">
                    <a href="/fotografii/<?= $one['parent_alias'] ?><?= (empty($one['parent_alias'])) ? '' : '/' ?><?= $one['alias'] ?>">
                        <table style="width:100%">
                            <tbody>
                            <tr>
                                <td style="text-align:right"><?= $one['name'] ?><small><?=$one['text']?></small></td>
                                <td style="text-align:left">
                                    <img class="lazy" alt="" style="max-height:100px;display: none;"
                                         data-original="/images/gallery/<?= $one['image'] ?>"/>
                                         <noscript>
                                         <img alt="" style="max-height:100px;"
                                         src="/images/gallery/<?= $one['image'] ?>"/>
                                         </noscript>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </a>
                </div>
                <?php

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