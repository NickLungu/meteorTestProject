<?php

function connectToDB()
{
    static $connect = null;

    if (null === $connect) {
        $connect = new mysqli(HOST_DB, LOGIN_DB, PASSWORD_DB, NAME_DB) or die('connection Error');
    }

    return $connect;
}
