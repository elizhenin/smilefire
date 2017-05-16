
<?php
include_once('engine.php');

$site_content['title']='Календарь - Огненное и Световое шоу SmileFire! Воронеж';
$site_content['head']='<link rel="canonical" href="http://smilefire.ru/price.php" />';

$site_content['nav']='<ul id="menu">
                <li ><a id="menu1" href="o-teatre">О театре</a></li>
                <li ><a id="menu2" href="faer-shou">Огненное шоу</a></li>
                <li ><a id="menu3" href="svetovoe-shou">Световое шоу</a></li>
                <li ><a id="menu4" href="kontakty">Контакты</a></li>
            </ul>';

$site_content['left_column']='';
if (USER_EDITOR=='true'){
  $site_content['center_column']=window('center','<iframe src="http://www.google.com/calendar/embed?mode=AGENDA&src=smilefire.ru_794ehtkk9ppeekkj3if69ggb0g%40group.calendar.google.com&ctz=Europe/Moscow" style="border: 0px;width:100%;height:600px;"></iframe>');}
else{
  $site_content['center_column']=window('center','У вас недостаточно прав для просмотра календаря выступлений.<br><br>Если вы являетесь членом коллектива, вам нужно авторизоваться на сайте с помощью панели в верхнем правом углу страницы.');}

$site_content['right_column']=window('left',file_get_contents('content/contacts_side.html')).window('left',file_get_contents('content/menu_side.html'));

$site_content['footer']='content/footer.php';

include_once('content/skin.php');
?>
