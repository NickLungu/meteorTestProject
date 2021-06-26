<?php

/**
   * Функция выводит картинки на страницу
   * @param пусто
   * @return пусто
   */
function showUsersImages()
{
    $connection = connectToDB();
    $query = $connection->query(
        "SELECT pictures.id AS id, name, path FROM pictures
        JOIN picture_user
        ON picture_user.picture_id = pictures.id AND
        user_id = '{$_SESSION['userId']}'");
    while ($row = $query->fetch_assoc()) {
        if (file_exists("uploads/" . $row['path'])) {
            require($_SERVER['DOCUMENT_ROOT'] . '/templates/imageTemplateFile.php');
        }
    }
}
