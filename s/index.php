<?php
require_once('User.php');
require_once('UserRequest.php');
require_once('Json.php');

$data = $_GET;
$user = new User($data);

try {
    UserRequest::validate($data);
} catch (Exception $e) {
    echo $e->getMessage();
}

print_r(Json::from($data));