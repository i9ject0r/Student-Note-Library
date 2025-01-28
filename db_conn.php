<?php

$sname= "localhost";
$unmae= "root";
$password = "";

// $servername = "localhost";
// $username = "root";
// $password = "";


$db_name = "db_user";
// $mysqli = new mysqli("localhost", "user", "password", "database");
$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
}

// if ($mysqli->connect_error) {
// 	die("Connection failed: " . $conn->connect_error);
//   }
//   echo "Connected successfully";
  ?>
