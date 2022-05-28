
<?php
echo "wut is happening ";



include("connection.php");

echo "include"

$name = $_POST["full_name"];
$email = $_POST["email"];
$results = [
    "name" => $name,
    "email" => $email
];

?>