<?php
/* authFlag -
    0 - выводится всегда
    -1 - выводится только для неавторизированных
    1 - выводится только для авторизированных
*/
$menuList = [
    [
        'title' => 'Информация о проекте',
        'path' => '/',
        'authFlag' => 0
    ],
    [
        'title' => 'Авторизация',
        'path' => '/route/auth/',
        'authFlag' => -1
    ],
    [
        'title' => 'Регистрация',
        'path' => '/route/registration/',
        'authFlag' => -1
    ],
    [
        'title' => 'Картинки',
        'path' => '/route/workImg/',
        'authFlag' => 1
    ],
    [
        'title' => 'Выход',
        'path' => '/?exit=yes',
        'authFlag' => 1
    ],
];
