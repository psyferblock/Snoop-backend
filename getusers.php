<!-- // get all users with their relevant information



// charbel example -->

<?php


include("connection.php");


$query = $mysqli->prepare("SELECT * from users");
$json = $json_encode($query);
echo "$query";

?>