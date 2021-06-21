<?php
$serverName = "localhost";
$userName = "root";
$password = "";
$dbname = "justiceforfather";

$jsoninput=file_put_contents('php://input');

$userdetails=json_decode($jsoninput);
$user=$userdetails->username;
$email=$userdetails->email;
$password=$userdetails->password;

// Create connection
$dbconn = new mysqli($serverName,$userName,$password,$dbname);
// Check connection
if ($dbconn->connect_error) {
    echo  $dbconn->connect_error;
  }
else{
    echo "DB connection establised";
}

$sql = "INSERT INTO  registration ( user_name, user_email, user_password)
VALUES ('".$user."','".$email."','".$password."')";

if ($dbconn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

?>

