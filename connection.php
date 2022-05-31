<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');

$host = "localhost";
$db_user = "root";
$db_pass = null;
$db_name = "snoopdb";

$mysqli = new mysqli($host, $db_user, $db_pass, $db_name);

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
