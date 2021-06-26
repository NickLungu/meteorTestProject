<?php
/**
   * Функция сохраняет файл на сервер
   * @param image - картинка
   * @return имя файла либо null при несоответствии типа
   */
function uploadImage($image)
{
    $allowedExts = array('jpg', 'jpeg', 'gif');
    $extension = pathinfo($image['name'], PATHINFO_EXTENSION);

    if (!in_array($extension, $allowedExts)) {
        return null;
    }
    $filename = uniqid() . "." . $extension;

    move_uploaded_file($image['tmp_name'], "uploads/" . $filename);
    return $filename;
}
