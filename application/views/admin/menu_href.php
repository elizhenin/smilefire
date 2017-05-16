<tr>
    <td style="vertical-align: top">
        <div>
            <a target="_blank" href="/"><button>Открыть сайт</button></a>
        </div>
    </td>
    <td colspan="2">

        <div id="nav" style="margin-top:-40px;">
            <ul id="menu">
                <li><a href="<?= URL::site('administrator/articles'); ?>" <?=($alias=='articles')?"style=\"background-image: url('../css/images/li-bullet-red.jpg');\"":''?> >Статьи</a></li>
                <li><a href="<?= URL::site('administrator/gallery'); ?>" <?=($alias=='gallery')?"style=\"background-image: url('../css/images/li-bullet-red.jpg');\"":''?>>Фото</a></li>
                <li><a href="<?= URL::site('administrator/video'); ?>" <?=($alias=='video')?"style=\"background-image: url('../css/images/li-bullet-red.jpg');\"":''?>>Видео</a></li>
                <li><a href="<?= URL::site('administrator/news'); ?>" <?=($alias=='news')?"style=\"background-image: url('../css/images/li-bullet-red.jpg');\"":''?>>Новости</a></li>
            </ul>
        </div>
    </td>
</tr>