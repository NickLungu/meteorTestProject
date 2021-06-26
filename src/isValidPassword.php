<?php

function isValidPassword($passwordFst, $passwordScd)
{
    return ($passwordFst == $passwordScd && strlen($passwordFst) > PASSWORD_MIN_LEN && strlen($passwordFst) < PASSWORD_MAX_LEN);
}
