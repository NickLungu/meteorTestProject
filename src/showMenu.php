<?php

/**
   * Функция выводит элементы меню на страницу-
   * @param array $menu - массив пунктов меню
   * не возвращает
   */
function showMenu($menu)
{
    foreach ($menu as $element) {
        if ($element['authFlag'] == 0 ||
        (isAuth() && $element['authFlag'] == 1 ) ||
        (!isAuth() && $element['authFlag'] == -1)) {
            require($_SERVER['DOCUMENT_ROOT'] . '/templates/menu.php');
        }
    }
}
