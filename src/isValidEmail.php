<?php

function isValidEmail($email)
{
    return preg_match("/[0-9a-z]+@[a-z]/", $email);
}
