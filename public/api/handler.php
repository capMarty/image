<?php
header('Content-Type: application/json');

require_once "functions.php";


switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        (isset($_GET["id"])) 
            ? getUser($_GET["id"]) : getUsers();
        break;

    case 'POST':
        addUsers();
        break;

    case 'PUT':
        updateUser();
        break;

    case 'DELETE':
        deleteUser();
        break;

    default:
        http_response_code(405);
        break;
}
