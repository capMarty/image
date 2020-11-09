<?php

/**
 * 
 * @param string $str
 * @return bool|string
 */
function isStringValidate($str)
{
    if (!preg_match("#^[aA-zZ\-_]{2,}\s[aA-zZ\-_]{2,}$#", $str)) {
        return false;
    }

    return $str;
}

/**
 * 
 * @param  $phone
 * @return bool|string
 */
function isPhoneValidate($phone)
{
    if (!preg_match("/^[0-9]{10,10}+$/", $phone)) {
        return false;
    }

    return $phone;
}


/**
 * 
 * @param  $email
 * @return bool|string
 */
function isEmailValidate($email)
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "notnan";
        return false;
    }

    return $email;
}

/**
 * 
 * @param  string $str
 * @return bool|string
 */
function isEmptyValidate($str)
{
    if(empty(trim($str))){
        return false;
    }

    return $str;
}