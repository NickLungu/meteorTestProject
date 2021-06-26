<?php

require($_SERVER['DOCUMENT_ROOT'] . '/src/core.php');
if (!isAuth()) {
    header("Location: /");
}
if (isset($_POST['submit'])) {
    if (isset($_FILES['image']['tmp_name']) && $_FILES['image']['tmp_name'] != "") {

        // экранируем значение
        $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
        $filename = uploadImage($_FILES['image']);

        if (!$filename == null) {
            $connection = connectToDB();
            $connection->query("INSERT INTO pictures (img, name, path)
                                VALUES ('$image', '{$_FILES['image']['name']}', '$filename')");
            $query = $connection->query("SELECT MAX(id) AS count_id from pictures");
            $countId = (int)$query->fetch_assoc()['count_id'];
            $userId = $_SESSION['userId'];

            $connection->query("INSERT INTO picture_user (picture_id, user_id) VALUES ('$countId', '$userId')");
        }
    }
} else if (!empty($_POST)) {
    /* получаем ключ первого элемента,
    в котором хранится номер удаляемого изображения*/
    $key = array_key_first($_POST);

    /* далее вычисляем id изображения в базе */
    $idImg = intval(substr($key, 7, strlen($key) - 6));

    $connection = connectToDB();
    $connection->query("DELETE FROM pictures WHERE id = '$idImg'");
    $connection->query("DELETE FROM picture_user WHERE picture_id = '$idImg'");
}
require($_SERVER['DOCUMENT_ROOT'] . '/templates/header.php');
?>
        <div class="content-images">

            <form method="post" enctype="multipart/form-data">
                <input type="file" accept=".jpg" name="image"/>
                <input type="submit" name="submit" value="Загрузить"/>
            </form>
            <hr/>
            <div class="images-container">
                <?=showUsersImages();?>
            </div>
        </div>
    </body>

</html>
