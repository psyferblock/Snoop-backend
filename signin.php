<?php
include("connection.php");

$email = $_POST["email"];
$password = hash("sha256", $_POST["password"]);

$query = $mysqli->prepare("SELECT user_id, full_name, email, gender, date_of_birth,user_type FROM users WHERE email = ? AND password = ?");
$query->bind_param("ss", $email, $password);
$query->execute();
$query->store_result();
$num_rows = $query->num_rows;
$query->bind_result($user_id, $full_name, $email, $gender, $date_of_birth, $user_type);
$query->fetch();
$response = [];

// condition for user to sign in 

if ($num_rows == 0) {
    $response["response"] = "User Not Found";
} else {
    $response["message"] = "Logged in";
    $response["user_id"] = $user_id;
    $response["full_name"] = $full_name;
    $response["email"] = $email;
    $response["gender"] = $gender;
    $response["date_of_birth"] = $date_of_birth;
    $response["user_type"] = $user_type;
}
echo json_encode($response);
