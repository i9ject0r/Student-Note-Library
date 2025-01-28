<?php
session_start();
include("../db_conn.php");

$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List User Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
 
    
</head>
<body class="flex flex-col items-center justify-center min-h-screen text-white">
    <header class="w-full p-4 flex justify-between items-center bg-transparent">
        <h1 class="text-2xl font-bold">Welcome</h1>
        <nav class="navbar flex space-x-4">
            <a href="index.php">Home</a>
            <a href="list_note.php">List Note</a>
            <a href="list_user.php">List User</a>
            <a href="profile.php">Profile</a>                
            <a href="logout.php" class="border border-white px-4 py-2 rounded">ADMIN</a>
        </nav>
    </header>

    <main class="flex flex-col items-center justify-center flex-grow">
        <div class="login-box text-center">
        <table class="table">
        <thead>
            <tr>
                <th scope="col">Profile</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">password</th>
                <th scope="col">delete</th>
                <th scope="col">edit</th>
                <th scope="col">upload</th>
            </tr>
        </thead>
        <tbody>
        <?php

for( $i = 0; $i < count($row); $i++) { ?>
    <tr>
    <td><img class="profile-img-rounded" src="../assets/img/<?=$row[$i]['id']?>/profile_pic.png" alt=""></td>
    <td><?=$row[$i]['name']?></td>
    <td><?=$row[$i]['email']?></td>
    <td><?=$row[$i]['password']?></td>
    <td><a href="delete_user.php?id=<?=$row[$i]['id']?>" class="btn px-3 py-1 btn-danger"><i class="fa fa-trash" ></i></a></td>
    
    <td><a class="btn btn-primary btn-xs py-1 px-3" href="edit.php?id=<?=$row[$i]['id']?>">Edit</a></td>
    <td><a class="btn btn-secondary btn-xs py-1 px-3" href="upload.php?id=<?=$row[$i]['id']?>">Upload</a></td>
</tr>

<?php } ?>

            
        </tbody>
    </table>

    
</body>
</html>

