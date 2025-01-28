<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['email']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$email = validate($_POST['email']);
	$pass = validate($_POST['password']);

	if (empty($email)) {
		header("Location: index.php?error=User Name is required");
	    exit();
	}else if(empty($pass)){
        header("Location: index.php?error=Password is required");
	    exit();
	}else{
		$sql = "SELECT * FROM users WHERE email='$email' AND password='$pass'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['email'] === $email && $row['password'] === $pass) {
            	$_SESSION['email'] = $row['email'];
				$_SESSION['name'] = $row['name'];
				$_SESSION['role_id'] = $row['role_id'];
            	$_SESSION['id'] = $row['id'];


            	if ($row['role_id'] == 1) {
                    header("Location: admin/index.php"); // Admin page
                } else if ($row['role_id'] == 2) {
                    header("Location: home.php"); // User page
                } else {
                    header("Location: index.php?error=Unknown role");
                }
		        exit();
				
            }else{
				header("Location: index.php?error=Incorect User name or password");
		        exit();
			}
		}else{
			header("Location: index.php?error=Incorect User name or password");
	        exit();
		}

		
	}
	
}else{
	header("Location: index.php");
	exit();
}
?>