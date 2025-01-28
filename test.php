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
        header("Location: index.php?error=Email is required");
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
                $_SESSION['id'] = $row['id'];
                header("Location: home.php");
                exit();
            }else{
                header("Location: index.php?error=Incorrect email or password");
                exit();
            }
        }else{
            header("Location: index.php?error=Incorrect email or password");
            exit();
        }
    }
    
}else{
    header("Location: index.php");
    exit();
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-image: url("./assets/img/sunset.jpg");
            background-size: cover;
            background-position: center;
        }
        .navbar a {
            color: white;
            text-decoration: none;
            padding: 0.5rem 1rem;
        }
        .navbar a:hover {
            text-decoration: underline;
        }
        .login-box {
            background: rgba(255, 255, 255, 0.1);
            padding: 2rem;
            border-radius: 0.5rem;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }
        .error {
            background-color: rgba(255, 0, 0, 0.7);
            color: white;
            padding: 0.5rem;
            margin-bottom: 1rem;
            border-radius: 0.25rem;
        }
    </style>
</head>
<body class="flex flex-col items-center justify-center min-h-screen text-white">
    <header class="w-full p-4 flex justify-between items-center bg-transparent">
        <h1 class="text-2xl font-bold">Welcome</h1>
        <nav class="navbar flex space-x-4">
            <a href="#">Home</a>
            <a href="#">About</a>
            <a href="#">Service</a>
            <a href="#">Contact</a>
            <a href="#" class="border border-white px-4 py-2 rounded">Login</a>
        </nav>
    </header>
    <main class="flex flex-col items-center justify-center flex-grow">
        <div class="login-box text-center">
            <h2 class="text-3xl font-bold mb-4">Login</h2>

            <!-- PHP code to display error messages -->
            <?php if (isset($_GET['error'])) { ?>
                <p class="error"><?php echo htmlspecialchars($_GET['error']); ?></p>
            <?php } ?>

            <form method="post" action="index.php" class="space-y-4">
                <div>
                    <input type="email" name="email" placeholder="Enter your email" class="w-full p-2 rounded bg-transparent border-b-2 border-white text-white placeholder-white focus:outline-none">
                </div>
                <div>
                    <input type="password" name="password" placeholder="Enter your password" class="w-full p-2 rounded bg-transparent border-b-2 border-white text-white placeholder-white focus:outline-none">
                </div>
                <div class="flex justify-between items-center text-sm">
                    <label class="flex items-center">
                        <input type="checkbox" class="mr-2">
                        Remember me
                    </label>
                </div>
                <button type="submit" class="w-full py-2 bg-white text-purple-700 font-bold rounded">Log In</button>
            </form>
            <p class="mt-4">Don't have an account? <a href="./register.php" class="text-white underline">Register</a></p>
        </div>
    </main>
</body>
</html>
