
<?php
include("connection.php");

$user_id = $_POST["user_id"];

// get user id from post
// return users if user id is admin



$query = $mysqli->prepare("SELECT * from users");
$json = $json_encode($query);
echo "$query";

?>