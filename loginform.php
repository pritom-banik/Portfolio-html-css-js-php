<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Pritom's Dashboard</title>
</head>

<body class="bg-[rgb(36,36,36)] flex flex-col items-center justify-center h-screen text-white font-xl mb-4">

    <!-- Login Form -->
    <div class="form bg-black p-8 rounded-2xl shadow-lg w-96">
        <h1 class="text-3xl font-bold mb-6 text-center underline">
            Welcome to Pritom's Dashboard
        </h1>
        <form method="POST" class="space-y-5">
            <!-- Username -->
            <div>
                <label for="username" class="block text-sm mb-1 text-white">Name</label>
                <input type="text" id="username" name="username" required
                    class="w-full px-3 py-2 rounded-lg bg-gray-800 border border-gray-700 focus:ring-2 focus:ring-indigo-500 focus:outline-none">
            </div>
            <!-- Password -->
            <div>
                <label for="pass" class="block text-sm mb-1 text-white">Password</label>
                <input type="password" id="pass" name="pass" required
                    class="w-full px-3 py-2 rounded-lg bg-gray-800 border border-gray-700 focus:ring-2 focus:ring-indigo-500 focus:outline-none">
            </div>
            <!-- Button -->
            <button type="submit"
                class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-2 rounded-lg font-semibold cursor-pointer">
                Login
            </button>
        </form>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $password = $_POST["pass"];

        if ($username == "admin" && $password == "1234") {
            header("Location: settings.php");
            exit();
        } else {
            echo "<br>";
            echo "<div class='text-red-500 font-semibold mt-4'>❌ Try again</div>";
        }
    }
    ?>

</body>

</html>
