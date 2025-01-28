<?php
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
include("db_conn.php");

$sql = "SELECT * FROM nota WHERE user_id = {$_SESSION['id']}";
$result = mysqli_query($conn, $sql);
$roww = mysqli_fetch_all($result, MYSQLI_ASSOC);




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
        <link rel="stylesheet" href="style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        
    </head>

    <body class="flex flex-col items-center justify-center min-h-screen text-white">
        <header class="w-full p-4 flex justify-between items-center bg-transparent">
            <h1 class="text-2xl font-bold">Welcome</h1>
            <nav class="navbar flex space-x-4">
            <a href="home.php">Home</a>
            <a href="list_note.php">List Note</a>
            <a href="nota.php">Note</a>
            <a href="profile.php">Profile</a>
            <a href="logout.php" type="submit" class="border border-white px-4 py-2 rounded">Logout</a>
        </nav>
        </header>

        <main class="flex flex-col items-center justify-center flex-grow">

        <div class="card-container" style="display: flex; flex-wrap: wrap; justify-content: center; align-items: center; gap: 1rem; padding: 1rem;">
   
        <?php for ($i = 0; $i < count($roww); $i++) { ?>

        <div class="login-box text-center" style="width: 18rem; border: 1px solid #ccc; padding: 1rem; border-radius: 0.5rem; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
            <h6 class="card-subtitle h4 card-text"><?=$roww[$i]['note_title']?></h6>
       
            <p class="card-text"><?=$roww[$i]['detail']?>.</p>
            
            <div>
                <a href="#" class="card-link">user id: <?=$roww[$i]['user_id']?></a>
            </div>
        
        </div>
    <?php } ?>
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