<?php

/**
 * ==================================== POST user ==============
 * @return string json
 */

function addUsers()
{
    $users = [
        "name"  => $_POST["name"],
        "phone" => $_POST["phone"],
        "email" => $_POST["email"],
    ];

    $file = getPathFileData($users["name"]);

    if (file_exists($file)) {
        sendBadResponse("failed to create. File exist");
        exit;
    }


    $json = json_encode($users);
    $fd = fopen($file, "w");
    if ($fd) {
        fputs($fd, $json);
        sendGoodResponse("user added successfully", 201);
    } else {
        sendBadResponse("failed to insert");
    }
}
