<?php
include("connection.php");

$full_name = $_POST["full_name"];
$email = $_POST["email"];
$gender = $_POST["gender"];
$dob = $_POST["date_of_birth"];
$password = hash("sha256", $_POST["password"]);
$user_type = 0;

$query = $mysqli->prepare("INSERT INTO users(full_name, email, gender, date_of_birth, password, user_type) VALUES (?,?,?,?,?,?) ON DUPLICATE KEY UPDATE gender=gender");
$query->bind_param("ssissi", $full_name, $email, $gender, $dob, $password, $user_type);
$query->execute();

$response_query = $mysqli->prepare("SELECT user_id, full_name, email, gender, date_of_birth,user_type FROM users WHERE email = ? AND password = ?");
$response_query->bind_param("ss", $email, $password);
$response_query->execute();
$response_query->store_result();
$num_rows = $response_query->num_rows;
$response_query->bind_result($response_user_id, $response_full_name, $response_email, $response_gender, $response_date_of_birth, $response_user_type);
$response_query->fetch();
$response = [];

$response["success"] = true;

if ($num_rows == 0) {
    $response["response"] = "User Not Found";
} else {
    $response["message"] = "Logged in";
    $response["user_id"] = $response_user_id;
    $response["full_name"] = $response_full_name;
    $response["email"] = $response_email;
    $response["gender"] = $response_gender;
    $response["date_of_birth"] = $response_date_of_birth;
    $response["user_type"] = $response_user_type;
}
echo json_encode($response);
?>