<?php 
session_start();


if (isset($_SESSION['id']) && isset($_SESSION['email'])) {

    


 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
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

     <form method="post" action="logout.php" class="space-y-4">
        <div class="card" style="width: 8rem;">
        <img src="assets/img/<?=$_SESSION['id']?>/profile_pic.png" class="card-img-top" alt="">
        <div class="card-body">
        <h1 class="card-text">Hello, <?php echo $_SESSION['email']; ?></h1>
        </div>
    </div>

        <button type="submit" class="w-full py-2 bg-white text-purple-700 font-bold rounded">Logout</button>
        </div>
     </form>

    </main>
</body>
</html>

<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>

<a class="card-text">Hello, <?php echo $_SESSION['email']; ?></a>