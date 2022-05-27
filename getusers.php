// get all users with their relevant information



// charbel example

<?php
include("connection.php");
$query = $mysqli->prepare("SELECT title from todos");
$query->execute();
$array = $query->get_result();
$response = [];
while ($todo = $array->fetch_assoc()) {
    $response[] = $todo;
}
$json = json_encode($response);
echo $json;

?>