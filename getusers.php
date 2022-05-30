
<?php
include("connection.php");

$user_id = $_POST["user_id"];

$query = $mysqli->prepare("SELECT user_id, user_type FROM users WHERE user_id = ? AND user_type = 1");
$query->bind_param("ss", $user_id, $user_type);
$query->execute();
$query->store_result();
$num_rows = $query->num_rows;
$query->bind_result($user_id, $full_name, $email, $gender, $date_of_birth, $user_type);
$query->fetch();
$response = [];
// get user id from post
// return users if user id is admin

$query = $mysqli->prepare("SELECT * from users");
echo json_encode($response);

?>