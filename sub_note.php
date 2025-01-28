<?php
session_start();
include "db_conn.php";


if (isset($_POST['note_title']) && isset($_POST['details'])) {


    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $note_title = validate($_POST['note_title']);
    $detail = validate($_POST['details']);
    $user_id = $_SESSION['id'];



    $sql = "INSERT INTO nota (note_title, detail,user_id) VALUE('$note_title','$detail','$user_id')";
    echo $sql;
    $result = mysqli_query($conn, $sql);

    if($result) {
        header("Location: list_note.php");
        exit();
    } else {
        header("Location: nota.php?error");
        exit();
    }



} 

?>