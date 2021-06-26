<?php

function isValidLogin($login)
{

    $connection = connectToDB();
    $stmt = $connection->query("SELECT COUNT(id) FROM users WHERE login = '{$login}'");

    return $stmt->fetch_assoc()[0] == 0;

}
