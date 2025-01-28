<?php
session_start();
include "../db_conn.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM users WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: list_user.php");
     exit();
   }else {
           header("Location: signup.php?error=unknown error occurred&$user_data");
        exit();
   }

}
?>