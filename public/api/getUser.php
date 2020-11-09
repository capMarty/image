<?php


/**
 * ==================================== GET users ==============
 * @return string json
 */

function getUsers()
{

    $users = getArrayUsers();
    if (!$users) {
        sendBadResponse("not users", 200);
        exit;
    }
    echo json_encode($users);
}

/**
 * ==================================== GET user ===================
 * 
 * @param int $id User ID
 * @return string json
 */

function getUser($id)
{
    $users = getArrayUsers();

    if (array_key_exists($id, $users)) {
        echo json_encode($users[$id]);
    } else {
        sendBadResponse("User not found", 404);
    }
}
