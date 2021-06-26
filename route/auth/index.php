<?php
require($_SERVER['DOCUMENT_ROOT'] . '/src/core.php');

if (isAuth()) {
    header("Location: /");
}

$showError = false;
setcookie("test", 'test', time()+60*60*24*30);
if (!empty($_POST) && isset($_POST['login']) && isset($_POST['password'])) {
    $connect = connectToDB();

    // экранируем параметр
    $login = mysqli_real_escape_string($connect, $_POST['login']);
    if ($stmt = $connect->prepare("SELECT id, password FROM users WHERE login = ? LIMIT 1")) {
        $stmt->bind_param("s", $login);
        $stmt->execute();
        $stmt->bind_result($resultId, $resultPassword);
        $stmt->fetch();
        $showError = true;
        if (password_verify($_POST['password'], $resultPassword)) {

            $_SESSION['isAuth'] = true;
            $_SESSION['userName'] = $login;
            $_SESSION['userId'] = $resultId;
            setcookie("login", $login, time()+60*60*24*30);
            $show = true;
            $stmt->close();
            header("Location: /route/workImg/");
        }
        $stmt->close();
    }
}
require($_SERVER['DOCUMENT_ROOT'] . '/templates/header.php');
?>
        <div class="content">
            <?php if ($showError) { ?>
                <p>Неверный логин или пароль</p>
            <?php } ?>
            <div class="index-auth">
                <form action="" method="POST">
                    <table width="50%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td class="iat">
                                <label for="login_id">Ваш логин:</label>
                                <input id="login_id" size="30" name="login" value = <?= $_COOKIE['login']?>>
                            </td>
                        </tr>
                        <tr>
                            <td class="iat">
                                <label for="password_id">Ваш пароль:</label>
                                <input id="password_id" size="30" name="password" type="password">
                            </td>
                        </tr>
                        <tr>
                            <td><input type="submit" value="Войти"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </body>

</html>
