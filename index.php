<?php
require($_SERVER['DOCUMENT_ROOT'] . '/src/core.php');
if (!empty($_GET) && isset($_GET['exit'])) {
    session_destroy();
    header("Location: /");
}
require($_SERVER['DOCUMENT_ROOT'] . '/templates/header.php');
?>
        <div class="content">
            <div class="project-info">
                <h1>Добро пожаловать на главную страницу проекта</h1>

                <p style = "font-size: 1.5em"><i>Функциональность:</i></p>
                <ul>
                    <li>Авторизация, регистрация либо выход из учетной записи</li>
                    <li>Возможность загрузки картинки пользователем</li>
                </ul>
            </div>
        </div>
    </body>

</html>
