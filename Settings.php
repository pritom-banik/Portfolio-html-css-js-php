<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Pritom's Dashboard</title>
</head>

<body class="bg-[rgb(36,36,36)] flex flex-col items-center justify-center h-screen colors-white font-xl mb-4">


    <div class="form bg-black text-white p-8 rounded-2xl shadow-lg w-96">
        <h1 class="text-3xl font-bold mb-6 text-center underline">
            Welcome to Pritom's Dashboard
        </h1>
        <form method="POST" action="Settings.php" class="space-y-5">
            <!-- Username -->
            <div>
                <label for="username" class="block text-sm font-medium">Name</label>
                <input type="text" id="username" name="username" required
                    class="w-full mt-1 px-3 py-2 rounded-lg bg-gray-800 border border-gray-700 focus:ring-2 focus:ring-indigo-500 focus:outline-none">
            </div>
            <!-- Password -->
            <div>
                <label for="pass" class="block text-sm font-medium">Password</label>
                <input type="password" id="pass" name="pass" required
                    class="w-full mt-1 px-3 py-2 rounded-lg bg-gray-800 border border-gray-700 focus:ring-2 focus:ring-indigo-500 focus:outline-none">
            </div>
            <!-- Button -->
            <button type="submit"
                class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-2 rounded-lg font-semibold transition duration-300">
                Login
            </button>
        </form>
    </div>


    <div class="response flex flex-col items-center mt-6 w-full max-w-4xl px-4">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
            // $password = filter_input(INPUT_POST, "pass", FILTER_SANITIZE_STRING);
        
            $username = "Portfolio-owner";
            $password = "2021";
            $connection = mysqli_connect("localhost", $username, $password, "pritom_portfolio");

            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                exit();
            } else {
                echo "<div class='bg-green-600 text-white px-6 py-3 rounded-lg shadow-md w-full text-center font-semibold'>
                    ✅ Login Successful
                  </div>";

                // Step 1: Get all table names
                $tables = mysqli_query($connection, "SHOW TABLES FROM pritom_portfolio");

                while ($tableRow = mysqli_fetch_array($tables)) {
                    $tableName = $tableRow[0];
                    //echo $tableName;
                    // echo "<br>";
                    echo "<div class='bg-black text-white mt-8 w-full rounded-xl shadow-lg p-6'>";
                    echo "<h3 class='text-xl font-bold mb-4 border-b border-gray-700 pb-2'>📌 Table: $tableName</h3>";

                    $allData = mysqli_query($connection, "SELECT * FROM `$tableName`");
                    echo "<div class='overflow-x-auto'>";
                    echo "<table class='min-w-full text-sm text-left border border-gray-700 rounded-lg'>";

                    //clumn names
                    echo "<thead class='bg-gray-800'>";
                    echo "<tr>";

                    $columnName = mysqli_fetch_fields($allData);
                    foreach ($columnName as $column) {
                        echo "<th class='px-4 py-2 border border-gray-700'>" . $column->name . "</th>";
                    }

                    echo "</tr>";
                    echo "</thead>";

                    //table rows
                    echo "<tbody>";
                    while ($row = mysqli_fetch_assoc($allData)) {
                        echo "<tr class='hover:bg-gray-700'>";
                        foreach ($row as $key => $value) {
                            if ($key === "image" && !empty($value)) {
                                $base64 = base64_encode($value);
                                echo "<td class='px-4 py-2 border border-gray-700'>
                                         <img src='data:image/jpeg;base64,$base64' width='80' class='rounded-md shadow-sm'>
                                       </td>";
                            } else {
                                echo "<td class='px-4 py-2 border border-gray-700'>" . htmlspecialchars($value) . "</td>";
                            }
                        }



                        echo "<td class='px-4 py-2 border border-gray-700'>
                                <form method='POST' class='inline'>
                                    <input type='hidden' name='username' value='$username'>
                                    <input type='hidden' name='pass' value='$password'>
                                    <input type='hidden' name='table' value='$tableName'>
                                    <input type='hidden' name='id' value='" . $row['id'] . "'>
                                    <input type='hidden' name='action' value='delete'>
                                    <button type='submit' class='bg-red-600 hover:bg-red-700 px-3 py-1 rounded-lg text-white text-sm cursor-pointer'>
                                        Delete
                                    </button>
                                </form>
                              </td>";

                        echo "</tr>";
                    }

                    echo "</tbody>";

                    echo "</table>";
                    echo "</div>";
                    echo "</div>";
        
                    ?>

                    <h4 class='text-lg font-bold mt-1 mb-4 text-white'>Add new row to <?php echo $tableName ?></h4>
                    <form method='POST' class='add flex gap-3'>
                        <?php
                        foreach ($columnName as $field) {
                            if ($field->name === "id")
                                continue;
                            ?>
                            <div>
                                <label class='block text-sm mb-1 text-white'><?php echo $field->name ?></label>
                                <input type='text' name='<?php echo $field->name ?>'
                                    class='w-full px-3 py-2 rounded-lg bg-gray-800 border border-gray-700 focus:ring-2 focus:ring-indigo-500 focus:outline-none'>
                            </div>
                        <?php } ?>

                        <input type='hidden' name='username' value='<?php echo $username ?>'>
                        <input type='hidden' name='pass' value='<?php echo $password ?>'>
                        <input type='hidden' name='table' value='<?php echo $tableName ?>'>
                        <input type='hidden' name='action' value='create'>

                        <button type='submit'
                            class='bg-indigo-600 hover:bg-indigo-700 px-4 py-1 rounded-lg text-white font-semibold cursor-pointer'>
                            Create
                        </button>
                    </form>
                    <?php
                }



            }
        }
        ?>


    </div>
</body>

</html>