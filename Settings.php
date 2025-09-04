<?php
session_start();

$username = "Portfolio-owner";
$password = "2021";
$connection = mysqli_connect("localhost", $username, $password, "pritom_portfolio");



if ($_SERVER["REQUEST_METHOD"] === "POST" && $_POST['action'] === "delete") {
    $table = $_POST['table'];
    $id = $_POST['id'];
    $query = "DELETE FROM `$table` WHERE id = $id";

    if (mysqli_query($connection, $query)) {
        $_SESSION['message'] = [
            'type' => 'success',
            'text' => "Row with ID $id deleted successfully from $table"
        ];
    } else {
        $_SESSION['message'] = [
            'type' => 'error',
            'text' => "Error: " . mysqli_error($connection)
        ];
    }

    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}


if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['action']) && $_POST['action'] === "create") {
    $table = $_POST['table'];

    if (!empty($table)) {
        $result = mysqli_query($connection, "SHOW COLUMNS FROM `$table`");
        $columns = [];
        $values = [];

        while ($col = mysqli_fetch_assoc($result)) {
            $colName = $col['Field'];
            if ($colName === "id")
                continue;

            if ($colName === "image") {
                if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
                    $imageData = file_get_contents($_FILES['image']['tmp_name']);
                    $imageData = mysqli_real_escape_string($connection, $imageData);
                    $columns[] = "`$colName`";
                    $values[] = "'$imageData'";
                }
            } else {
                if (isset($_POST[$colName])) {
                    $val = mysqli_real_escape_string($connection, $_POST[$colName]);
                    $columns[] = "`$colName`";
                    $values[] = "'$val'";
                }
            }
        }

        if (!empty($columns)) {
            $sql = "INSERT INTO `$table` (" . implode(",", $columns) . ") VALUES (" . implode(",", $values) . ")";

            if (mysqli_query($connection, $sql)) {
                $_SESSION['message'] = [
                    'type' => 'success',
                    'text' => "New row added successfully in $table"
                ];
            } else {
                $_SESSION['message'] = [
                    'type' => 'error',
                    'text' => "Error: " . mysqli_error($connection)
                ];
            }

            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Pritom's Dashboard</title>
</head>

<body class="bg-[rgb(36,36,36)] flex flex-col items-center justify-center text-white font-xl mb-4">

    <div class="response flex flex-col items-center mt-6 w-full max-w-4xl px-4">

        <?php

        if (isset($_SESSION['message'])) {
            $type = $_SESSION['message']['type'] === 'success' ? 'text-green-500' : 'text-red-500';
            $icon = $_SESSION['message']['type'] === 'success' ? '✅' : '❌';
            echo "<div class='w-full mb-4'>";
            echo "<p class='$type mt-4 text-center'>$icon " . $_SESSION['message']['text'] . "</p>";
            echo "</div>";
            unset($_SESSION['message']);
        }


        $tables = mysqli_query($connection, "SHOW TABLES FROM pritom_portfolio");

        while ($tableRow = mysqli_fetch_array($tables)) {
            $tableName = $tableRow[0];
            ?>

            <div class='bg-black mt-8 w-full rounded-xl shadow-lg p-6'>
                <h3 class='text-xl font-bold mb-4 border-b border-gray-700 pb-2'>Table: <?php echo $tableName ?></h3>
                <?php
                $allData = mysqli_query($connection, "SELECT * FROM `$tableName`");
                ?>

                <div class='overflow-x-auto'>
                    <table class='min-w-full text-sm text-left border border-gray-700 rounded-lg'>

                        <thead class='bg-gray-800'>
                            <tr>

                                <?php
                                $columnName = mysqli_fetch_fields($allData);
                                foreach ($columnName as $column) {
                                    ?>
                                    <th class='px-4 py-2 border border-gray-700'> <?php echo $column->name ?></th>
                                <?php } ?>

                                <th class='px-4 py-2 border border-gray-700'>Action</th>

                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            while ($row = mysqli_fetch_assoc($allData)) { ?>
                                <tr class='hover:bg-gray-900 transition-colors duration-300'>
                                    <?php
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
                                    ?>

                                    <td class='px-4 py-2 border border-gray-700'>
                                        <form method='POST' class='inline'>
                                            <input type='hidden' name='username' value=<?php echo $username ?>>
                                            <input type='hidden' name='pass' value=<?php echo $password ?>>
                                            <input type='hidden' name='table' value=<?php echo $tableName ?>>
                                            <input type='hidden' name='id' value=<?php echo $row['id'] ?>>
                                            <input type='hidden' name='action' value='delete'>
                                            <button type='submit'
                                                class='bg-red-600 hover:bg-red-700 px-3 py-1 rounded-lg text-white text-sm cursor-pointer'>
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Add Row Form -->
            <h4 class='text-lg font-bold mt-6 mb-4 text-white'>Add new row to <?php echo $tableName ?></h4>
            <form method='POST' enctype="multipart/form-data" class='add flex gap-3 flex-wrap'>
                <?php

                foreach ($columnName as $field) {
                    if ($field->name === "id")
                        continue;
                    ?>
                    <div>
                        <label class='block text-sm mb-1 text-white'><?php echo $field->name ?></label>

                        <?php if ($field->name === "image") { ?>
                            <!-- File input for images -->
                            <input type="file" name="<?php echo $field->name ?>" accept="image/*"
                                class="w-full px-3 py-2 rounded-lg bg-gray-800 border border-gray-700 focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                        <?php } else { ?>
                            <!-- Default text input -->
                            <input type="text" name="<?php echo $field->name ?>"
                                class="w-full px-3 py-2 rounded-lg bg-gray-800 border border-gray-700 focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                        <?php } ?>
                    </div>
                <?php } ?>

                <input type='hidden' name='username' value='<?php echo $username ?>'>
                <input type='hidden' name='pass' value='<?php echo $password ?>'>
                <input type='hidden' name='table' value='<?php echo $tableName ?>'>
                <input type='hidden' name='action' value='create'>

                <button type='submit'
                    class='bg-indigo-600 hover:bg-indigo-700 px-4 py-1 rounded-lg text-white font-semibold cursor-pointer'>
                    Insert
                </button>

            </form>


            <?php
        }
        ?>

    </div>

    <button id="myButton" class="bg-black text-white px-6 py-3 rounded-lg hover:bg-gray-800 transition cursor-pointer">
        Logout
    </button>
    <script>
        button = document.getElementById("myButton");
        button.addEventListener('click', () => {
            window.location.href = "loginform.php";
        });
    </script>

</body>

</html>