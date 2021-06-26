<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="/src/styles.css" rel="stylesheet">
        <title>Тестовый проект</title>
    </head>
    <body>
        <div class = "header">
            <div class = "navbar">
                <ul>
                    <?php showMenu($menuList);?>
                </ul>
            </div>
            <div class="logo">
                <?php if (isAuth()) { ?>
                    <img src="https://img.icons8.com/wired/64/000000/user.png"/>
                    <span class = "user-name"><?=$_SESSION['userName']?></span>
                <?php } ?>
                <img src="https://img.icons8.com/wired/64/000000/php.png"/>
                <span>METEOR TEST</span>
            </div>
        </div>
