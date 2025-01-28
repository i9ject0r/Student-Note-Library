<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body class="flex flex-col items-center justify-center min-h-screen text-white">
    <header class="w-full p-4 flex justify-between items-center bg-transparent">
        <h1 class="text-2xl font-bold">Welcome</h1>
        <nav class="navbar flex space-x-4">
            <a href="#">Home</a>
            <a href="#">About</a>
            <a href="nota.php">Note</a>
            <a href="#">Contact</a>
            <a href="#" class="border border-white px-4 py-2 rounded">Login</a>
        </nav>
    </header>
    <main class="flex flex-col items-center justify-center flex-grow">
        <div class="login-box text-center">
            <h2 class="text-3xl font-bold mb-4">Register</h2>

            <form method="post" action="singup.php" class="space-y-4">
            <div>
                    <input type="text" id="name" name="name" placeholder="Enter your name" class="w-full p-2 rounded bg-transparent border-b-2 border-white text-white placeholder-white focus:outline-none">
                </div>
                <div>
                    <input type="email" id="email" name="email" placeholder="Enter your email" class="w-full p-2 rounded bg-transparent border-b-2 border-white text-white placeholder-white focus:outline-none">
                </div>
                <div>
                    <input type="password" id="password" name="password" placeholder="Enter your password" class="w-full p-2 rounded bg-transparent border-b-2 border-white text-white placeholder-white focus:outline-none">
                </div>
                <div>
                    <input type="password" id="re_password" name="re_password" placeholder="Confirm your password" class="w-full p-2 rounded bg-transparent border-b-2 border-white text-white placeholder-white focus:outline-none">
                </div>
                
                
                <button type="submit" class="w-full py-2 bg-white text-purple-700 font-bold rounded">Sign Up</button>
            </form>
            <p class="mt-4">Already have an account? <a href="./index.php" class="text-white underline">Login</a></p>
        </div>
    </main>
</body>
</html>

