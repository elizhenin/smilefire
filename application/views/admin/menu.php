<?php
if(!empty($user)) {

    ?>
    <form mehod="GET" action="/administrator/changepass">
        <input type="submit" value="Сменить пароль">
    </form>
<hr>
    Пользователь: <?= $user ?>
    <form mehod="GET" action="/administrator/logout">
        <input type="submit" value="Выйти">
    </form>
<hr>

            <form mehod="GET" action="https://docs.google.com/a/smilefire.ru/spreadsheets/d/1Txp2M5o4U1a0OB_-ZtP1W-56NV9vamGADTSX1OnK4i4/edit#gid=662657666">
                <input type="submit" value="Заказник">
            </form>

            <form mehod="GET" action="http://www.google.com/calendar/hosted/smilefire.ru">
                <input type="submit" value="Календарь">
            </form>
    <hr>
    <form mehod="GET" action="/administrator/searchbots">
        <input type="submit" value="Индексация">
    </form>

<?php
}
else{
if (!empty($login_error)){
    ?>
    <p>Ошибка! неправильный логин или пароль!</p>
<?php
}
?>
<form action="/administrator/login" method="post">
    <table>
        <tr>
            <td align="right">
                Логин:
            </td>
            <td>
                <input type="text" value="" name="username" />
            </td>
        </tr>
        <tr>
            <td align="right">
                Пароль:
            </td>
            <td>
                <input type="password" value="" name="password" />
            </td>
        </tr>
        <tr>
            <td>
                &nbsp;
            </td>
            <td align="center">
                <input type="submit" value="Войти" name="enter" class="submbtn" />
            </td>
        </tr>
    </table>
</form>
<?php
}
?>