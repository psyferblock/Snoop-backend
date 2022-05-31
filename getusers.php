
<?php

include("connection.php");
$user_id = $_POST["user_id"];

// makes sure an admin is the person requesting
$query = $mysqli->prepare("SELECT a.user_id, a.full_name, a.email, a.gender, a.date_of_birth, a.user_type FROM users a, users b WHERE b.user_id = ? AND b.user_type = 1");
$query->bind_param("i", $user_id);
$query->execute();

$array = $query->get_result();
$response = [];
while($user = $array->fetch_assoc()){
    $response[] = $user;
} 

echo json_encode($response);
?>