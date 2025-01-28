<?php
session_start();

include "../db_conn.php";

$sql = "SELECT COUNT(id) as total FROM users";
$result = mysqli_query($conn, $sql);
// $row = mysqli_fetch_assoc($result);


if ($result) {
    $row = mysqli_fetch_assoc($result); // Fetch the result as an associative array
    $total_ids = $row['total']; // Get the total count of ids
} else {
    echo "Error: " . mysqli_error($conn);
}

$sql2 = "SELECT COUNT(id) as total FROM nota";
$result2 = mysqli_query($conn, $sql2);

if ($result2) {
    $row2 = mysqli_fetch_assoc($result2); // Fetch the result as an associative array
    $total_notes = $row2['total']; // Get the total count of ids
} else {
    echo "Error: " . mysqli_error($conn);
}


if (isset($_SESSION['id']) && isset($_SESSION['email'])) {

    if (!isset($_SESSION['role_id']) || $_SESSION['role_id'] != 1) {
        echo "Access denied!";
        exit();
    }



?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>List Note Page</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        
    </head>

    <body class="flex flex-col items-center justify-center min-h-screen text-white">

  

        <header class="w-full p-4 flex justify-between items-center bg-transparent]">
            <h1 class="text-2xl font-bold">Welcome</h1>
            <nav class="navbar flex space-x-4">
                <a href="#">Home</a>
                <a href="list_note.php">List Note</a>
                <a href="list_user.php">List User</a>
                <a href="profile.php">Profile</a>
                <a href="../logout.php" class="border border-white px-4 py-2 rounded">Logout</a>
            </nav>
        </header>

        <div class="container flex justify-center gap-4" style="padding: 1rem;">
        <div class="login-box text-center" style="width: 18rem; border: 1px solid #ccc; padding: 1rem; border-radius: 0.5rem; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); position: relative;">
            <i class='fas fa-user-check' style='font-size:36px; position: absolute; top: 50%; right: 1rem; transform: translateY(-50%);'></i>
            <p class="card-text h4">Today's User</p>
            <p class="card-link">Total User <?=$total_ids?></p>
            <p class="card-text">+3% than last month</p>
        </div>


        <div class="login-box text-center" style="width: 18rem; border: 1px solid #ccc; padding: 1rem; border-radius: 0.5rem; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); position: relative;">
            <i class='fas fa-file' style='font-size:36px; position: absolute; top: 50%; right: 1rem; transform: translateY(-50%);'></i>
            <p class="card-text h4">Today's Notes</p>
            <p class="card-link">Total Notes <?=$total_notes?></p>
            <p class="card-text">+1% than last month</p>
        </div>

        </div>



        <main class="flex flex-col items-center justify-center flex-grow">

        


            <div class="card-container" style="display: flex; flex-wrap: wrap; justify-content: center; align-items: center; gap: 1rem; padding: 1rem;">

               
            </div>




        </main>

    </body>

    </html>

<?php
} else {
    header("Location: index.php");
    exit();
}
?>