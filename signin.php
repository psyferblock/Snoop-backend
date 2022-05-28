// login or sign in of user

// get email password
// check if in table
// return user object with id and type

// charbel example to be edited

<?php
include("connection.php");
$email = $_POST["email"];
$password = hash("sha256", $_POST["password"]);
$query = $mysqli->prepare("Select id from users where email = ? AND password = ?");
$query->bind_param("ss", $email, $password);
$query->execute();
$query->store_result();
$num_rows = $query->num_rows;
$query->bind_result($id);
$query->fetch();
$response = [];
if ($num_rows == 0) {
    $response["response"] = "User Not Found";
} else {
    $response["response"] = "Logged in";
    $response["user_id"] = $id;
}
$json == json_encode($response);
echo $json;
