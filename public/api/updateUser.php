<?php

/**
 * ==================================== PUT user ==============
 * @return string json
 */

function updateUser()
{
 
    $id = file_get_contents('php://input');
    $data = json_decode($id, true);

    if(!isEmptyValidate($data["name"])){
        sendBadResponse("name is empty");
        exit;
    }

    if(isset($data["email"]) && !isEmptyValidate($data["email"])){
        sendBadResponse("email is empty");
        exit;
    }

    if(isset($data["phone"]) && !isEmptyValidate($data["phone"])){
        sendBadResponse("phone is empty");
        exit;
    }

    if(isset($data["phone"]) && !isPhoneValidate($data["phone"])){
        sendBadResponse("phone is errors");
        exit;
    }   
    
    if(isset($data["email"]) && !isEmailValidate($data["email"])){
        sendBadResponse("email is errors");
        exit;
    } 

    if(isset($data["name"]) && !isStringValidate($data["name"])){
        sendBadResponse("name is errors");
        exit;
    } 


    $file = getPathFileData($data["id"]);

    if (!file_exists($file)) {
        sendBadResponse("failed to update. File not exist");
        exit;
    }


    $data1  = file_get_contents($file);
    $data1 = json_decode($data1, true);

    if($data["name"] && $data["name"] !== $data1["name"]){
        $str = str_replace(' ', '_', $data["name"]) . ".json";
        $filenew = $GLOBALS["path"] . "/" . $str;
        rename($file, $filenew);
    }

    

    $data1["name"] = $data["name"] ?? $data1["name"];
    $data1["phone"] = $data["phone"] ?? $data1["phone"];
    $data1["email"] = $data["email"] ?? $data1["email"];


    if(file_put_contents($filenew, json_encode($data1))) {
        sendGoodResponse("user is updated");
        exit;
    }

    sendBadResponse("failed to update. Errors puts file");
}
