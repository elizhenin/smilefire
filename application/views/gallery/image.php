<?php
if (!empty($item)) {
    ?>
    <div><?=$item['name']?></div>
        <img alt="" style="max-height:600px;max-width:800px"
             src="/images/gallery/<?= $item['image'] ?>"/>
    <div><?=$item['text']?></div>
<?php
}
?>

<?=$back?>