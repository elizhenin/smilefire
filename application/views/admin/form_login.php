<?php
if (!empty($login_error)){
    ?>
    <p>Ошибка! неправильный логин или пароль!</p>
<?php
}
?>
<form method="post">
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