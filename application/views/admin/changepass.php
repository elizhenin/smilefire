<?php
if (!empty($login_error)){
    ?>
    <script>
        $(alert('<?=$login_error?>'));
    </script>
<?php
}
?>
<form action="" method="post">
    <table>
        <tr>
            <td align="right">
                Старый пароль:
            </td>
            <td>
                <input type="password" value="" name="oldpass" />
            </td>
        </tr>
        <tr>
            <td colspan="2">
                &nbsp;
            </td>
        </tr>
        <tr>
            <td align="right">
                Новый пароль:
            </td>
            <td>
                <input type="password" value="" name="newpass1" />
            </td>
        </tr>
        <tr>
            <td align="right">
                Повторите:
            </td>
            <td>
                <input type="password" value="" name="newpass2" />
            </td>
        </tr>
        <tr>
            <td>
                &nbsp;
            </td>
            <td align="center">
                <input type="submit" value="Изменить" name="enter" class="submbtn" />
            </td>
        </tr>
    </table>
</form>