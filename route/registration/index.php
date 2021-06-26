<?php
require($_SERVER['DOCUMENT_ROOT'] . '/src/core.php');

if (isAuth()) {
    header("Location: /");
}

$PasswordsSuccess = true;
$EmailSuccess = true;
$PasswordsSuccess = true;
if (!empty($_POST)
    && isset($_POST['login'])
    && isset($_POST['password_first'])
    && isset($_POST['password_second'])
    && isset($_POST['email'])) {

        $login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
        $passwordFst = filter_var(trim($_POST['password_first']), FILTER_SANITIZE_STRING);
        $passwordScd = filter_var(trim($_POST['password_second']), FILTER_SANITIZE_STRING);
        $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);

        $PasswordsSuccess = isValidPassword($passwordFst, $passwordScd);
        $EmailSuccess = isValidEmail($email);
        $LoginSuccess = isValidLogin($login);

        if ($PasswordsSuccess && $EmailSuccess && $LoginSuccess) {
            $hashedPassword = password_hash($passwordFst, PASSWORD_DEFAULT);
            $connection = connectToDB();
            $connection->query("INSERT INTO users (login, password, email) VALUES ('$login', '$hashedPassword', '$email')");
            /*$connetion->close();*/
        }
    /*$connect = connectToDB();

    // экранируем параметр
    $login = mysqli_real_escape_string($connect, $_POST['login']);
    if ($stmt = $connect->prepare("SELECT id, password FROM users WHERE login = ? LIMIT 1")) {
        $stmt->bind_param("s", $login);
        $stmt->execute();
        $stmt->bind_result($resultId, $resultPassword);
        $stmt->fetch();

        if ($resultPassword == $_POST['password']) {
            $_SESSION['isAuth'] = true;
            $_SESSION['userName'] = $login;
            $_SESSION['userId'] = $resultId;
            setcookie("login", $login, time()+60*60*24*30);
            $show = true;
            $stmt->close();
            header("Location: /route/workImg/");
        }
        $stmt->close();*/
}
require($_SERVER['DOCUMENT_ROOT'] . '/templates/header.php');
?>
        <div class="content">
            <h1>Пройдите регистрацию</h1>
            <div class="index-auth">
                <form action="" method="POST">
                    <table width="50%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td class="iat">
                                <?php if (!$EmailSuccess) { ?>
                                    <p>Текущий логин занят</p>
                                <?php } ?>
                                <label for="login_id">Ваш логин:</label>
                                <input id="login_id" size="50" name="login" value = <?= $_COOKIE['login']?>>
                            </td>
                        </tr>
                        <tr>
                            <td class="iat">
                                <?php if (!$PasswordsSuccess) { ?>
                                    <p>Пароли не совпадают либо длина меньше <?=PASSWORD_MIN_LEN + 1?></p>
                                <?php } ?>
                                <label for="password_id">Введите пароль:</label>
                                <input id="password_first" size="50" name="password_first" type="password">
                            </td>
                        </tr>
                        <tr>
                            <td class="iat">
                                <label for="password_id">Повторите пароль:</label>
                                <input id="password_second" size="50" name="password_second" type="password">
                            </td>
                        </tr>
                        <tr>
                            <td class="iat">
                                <?php if (!$EmailSuccess) { ?>
                                    <p>Неверный адрес почты</p>
                                <?php } ?>
                                <label for="login_id">Адрес электронной почты:</label>
                                <input id="email" size="50" name="email">
                            </td>
                        </tr>
                        <tr>
                            <td><input type="submit" value="Зарегистрироваться"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </body>

</html>
