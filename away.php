<?php
if (isset($_GET['url'])) {$url = $_GET['url']; }
if (!isset($url))
{
$url = 'http://smilefire.ru'; //адрес вашего сайта
}
if (!preg_match('#(http?|ftp)://\S+[^\s.,>)\];\'\"!?]#i',$url)) {
exit ("<p>Неверный запрос! Проверьте URL!");
}
header("Location:$url");
exit();
?>