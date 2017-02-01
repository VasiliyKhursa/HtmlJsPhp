
    <html>
        <head>
            <title>javascript if</title>
            <link rel="stylesheet" type="text/css" href="style1.css">
            <script type="text/javascript" src="script.js"></script>
        </head>
        <body>
            <img src="images/pict1.gif"><br><br>
            <center>
                Перед регистрацией ознакомьтесь <a href="#">с правилами</a>.<br><br>
                <form name="forma1">
                    <table  border="0" cellspacing="5" cellpadding="5">
                        <caption>Форма регистрации</caption>
                        <tr><td align="right" valign="top">Имя</td>
                            <td><input type="text" name="name" size="25"></td>
                        </tr>
                        <tr><td align="right" valign="top">e-mail</td>
                            <td><input type="text" name="e-mail" size="25"></td>
                        </tr>
                        <tr><td align="right" valign="top" >Пароль</td>
                            <td><input type="password" name="password" size="25"></td>
                        </tr>
                        <tr><td align="right" valign="top" >Повтор пароля</td>
                            <td><input type="password" name="password1" size="25"></td>
                        </tr>
                        <tr><td align="right" valign="top" >Пол</td>
                            <td><input type="radio" name="sex" value="man" checked>мужской
                                <input type="radio" name="sex" value="woman"> женский
                            </td>
                        </tr>
                        <tr><td align="right" valign="top">Увлечения</td>
                            <td><select name="hobby" size="7" multiple>
                                    <option selected value="1">компьютеры
                                    <option value="2">спорт
                                    <option value="3">игры
                                    <option value="4">животные
                                    <option value="5">автомобили
                                    <option value="6">клубы
                                    <option value="7">музыка
                                </select>
                            </td>
                        </tr>
                        <tr><td align="right" valign="top">Ваши пожелания</td>
                            <td><textarea cols="30" rows="3" wrap="physical"></textarea>
                            </td>
                        </tr>
                        <tr><td align="right" colspan="2">
                                <input type="submit" name="submit" value="Отправить">
                                <input type="reset" name="reset" value="Очистить">
                            </td>
                        </tr>
                    </table>
                </form>
                <img src="images/pict2.gif">
            </center>
       </body>
    </html>
 