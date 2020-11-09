<?php

$path = "../users";
require_once "filterData.php";
require_once "createUser.php";
require_once "deleteUser.php";
require_once "getUser.php";
require_once "updateUser.php";

/**
 * @return array array of users from users.json
 */
function getArrayUsers()
{

    $fullName = $GLOBALS["path"] . '/';;
    $files = scandir($GLOBALS["path"]);
    $getArrayUsers = [];
    for ($i = 2; $i < count($files); $i++) {
        $content = file_get_contents("${fullName}$files[$i]");
        $getArrayUsers[] = json_decode($content, true);
    }

    return $getArrayUsers;
}

/**
 * 
 * @param string $msg message error
 * @param int $code code http response
 * @return string json
 */
function sendBadResponse($msg, $code = 400)
{
    http_response_code($code);
    $response = [
        "status" => false,
        "msg"    => $msg,
    ];

    echo json_encode($response);
}

/**
 * 
 * @param string $msg message success
 * @param int $code code http response
 * @return string json
 */
function sendGoodResponse($msg, $code = 200)
{
    http_response_code($code);
    $response = [
        "status" => true,
        "msg"    => $msg,
    ];

    echo json_encode($response);
}

/**
 * 
 * @param string $idname 
 * @return string path to file with data
 */
function getPathFileData($idname)
{
    $str = str_replace(' ', '_', $idname) . ".json";
    return $GLOBALS["path"] . "/" . $str;
}