
<?php
echo "wut is happening ";

// $name = $_POST["name"];
// $email = $_POST["email"];

// $results = [
//     "name" => $name,
//     "email" => $email
// ];
// echo json_encode($results);

// 

// sign up of user
// receive: full name, email, gender, dob,password to hash
// we make user type not admin by default



// charbel example, to be edited


include("connection.php");


// $id =$_POST["id"];
$name = $_POST["full_name"];
$email = $_POST["email"];
$results = [
    "name" => $name,
    "email" => $email
];
// $gender=$_POST["male/female"];
// $birth_date=$_POST["dob"];
// $password=$_POST["password"];
// $user_type=$_POST["user_type"];

// $query = $mysqli->prepare("INSERT INTO users(id,name,email, gender, birth_date,password,user_type) VALUES (?, ?, ?, ?,?,?,?)");
// $query->bind_param("ississi",$id,$name,$email, $gender, $birth_date,$password,$user_type);
// $query->execute();

$response = [];
$response["success"] = true;

echo json_encode($results);
echo json_encode($response);

?>