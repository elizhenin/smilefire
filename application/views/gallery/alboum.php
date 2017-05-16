<?=$back?>
<div class="images-container">
<?php
if (!empty($items)) {
    foreach ($items as $one) {
        switch ($one['type']) {
            case 'image':
                ?>
                <a href="/images/gallery/<?= $one['image'] ?>" title="<?= $one['text']?><small><?=$one['name']?></small>">
                     <img class="lazy div_image" 
                     alt="<?=(empty($one['keywords']))?$current['description'].' '.$one['name']:$one['keywords']?>"
                     style="max-height:300px;display: none;"
                     data-original="/images/gallery/<?= $one['image'] ?>"/>
                                         <noscript>
                                         <img class="div_image"
                                         alt="<?=(empty($one['keywords']))?$current['description'].' '.$one['name']:$one['keywords']?>"
                                         style="max-height:300px;"
                                         src="/images/gallery/<?= $one['image'] ?>"/>
                                         </noscript>
                </a>  
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
</div>