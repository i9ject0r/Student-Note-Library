<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['name'])
    && isset($_POST['email']) && isset($_POST['re_password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}


	$name = validate($_POST['name']);
	$email = validate($_POST['email']);
	$pass = validate($_POST['password']);

	$re_pass = validate($_POST['re_password']);
	$email = validate($_POST['email']);

	$user_data = 'email='. $email;


	if (empty($email)) {
		header("Location: signup.php?error=User Name is required&$user_data");
	    exit();
	}else if(empty($pass)){
        header("Location: signup.php?error=Password is required&$user_data");
	    exit();
	}
	else if(empty($re_pass)){
        header("Location: signup.php?error=Re Password is required&$user_data");
	    exit();
	}

	else if(empty($email)){
        header("Location: signup.php?error=Name is required&$user_data");
	    exit();
	}

	else if($pass !== $re_pass){
        header("Location: signup.php?error=The confirmation password  does not match&$user_data");
	    exit();
	}

	else{

		// hashing the password
      //  $pass = md5($pass);


	    $sql = "SELECT * FROM users WHERE email='$email' ";
		$result = mysqli_query($conn, $sql);
		

		if (mysqli_num_rows($result) > 0) {
			header("Location: signup.php?error=The username is taken try another&$user_data");
	        exit();
		}else {
			$sql2 = "INSERT INTO users(name, email, password, role_id) VALUES('$name', '$email', '$pass', 2)";
			$result2 = mysqli_query($conn, $sql2);

           if ($result2) {
           	 header("Location: index.php?success=Your account has been created successfully");
			 exit();
           }else {
	           	header("Location: signup.php?error=unknown error occurred&$user_data");
		        exit();
           }
		}
	}
	
}else{
	header("Location: register.php");
	exit();
}