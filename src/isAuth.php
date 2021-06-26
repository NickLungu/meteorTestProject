<?php

function isAuth()
{
    if (isset($_SESSION['isAuth'])) {
        return $_SESSION['isAuth'] === true;
    }

    return false;
}
