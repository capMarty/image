<?php
/**
 * ==================================== DELETE user ==============
 * @return string json
 */

function deleteUser()
{
    $users = getArrayUsers();

    //get frontend data
    $id = file_get_contents('php://input');
    $data = json_decode($id, true);


    $file = getPathFileData($users[$data["id"]]["name"]);

    if(!file_exists($file)) {
        sendBadResponse("failed to delete.File not exist");
        exit;
    } else {
        unlink($file);
        sendGoodResponse("user is deleted");
        exit;
    }

    if (!array_key_exists($data["id"], $users)) {
        sendBadResponse("failed to delete");
        exit;
    }
}
