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
            <h2 class="text-3xl font-bold mb-4">Login</h2>

            <form method="post" action="login.php" class="space-y-4">
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