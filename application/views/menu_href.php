<?php if(empty($alias)) $alias = ''; ?>
<tr>
    <td colspan="3">
        <div id="nav" style="margin-top:-40px;">
            <ul id="menu">
                <li><a id="menu1" href="<?= URL::site('o-teatre'); ?>" <?=($alias=='o-teatre')?"style=\"background-image: url('css/images/li-bullet-red.png');\"":''?> >О театре</a></li>
                <li><a id="menu2" href="<?= URL::site('faer-shou'); ?>" <?=($alias=='faer-shou')?"style=\"background-image: url('css/images/li-bullet-red.png');\"":''?>>Огненное шоу</a></li>
                <li><a id="menu3" href="<?= URL::site('svetovoe-shou'); ?>" <?=($alias=='svetovoe-shou')?"style=\"background-image: url('css/images/li-bullet-red.png');\"":''?>>Световое шоу</a></li>
                <li><a id="menu4" href="<?= URL::site('kontakty'); ?>" <?=($alias=='kontakty')?"style=\"background-image: url('css/images/li-bullet-red.png');\"":''?>>Контакты</a></li>

            </ul>
        </div>
    </td>
</tr>