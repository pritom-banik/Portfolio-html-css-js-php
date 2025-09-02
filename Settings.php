<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pritom's Dashboard</title>
</head>
<body>
    <form method="POST" action="Settings.php">
        <label for="username">Name</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="pass">Password:</label>
        <input type="password" id="pass" name="pass" required>
        <br>
        <button type="submit">login</button>
    </form>

    <?php
    if($_SERVER["REQUEST_METHOD"]=="POST"){
    $username = filter_input(INPUT_POST,"username",FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST,"pass",FILTER_SANITIZE_STRING);

    try {
        $connection = mysqli_connect("localhost",$username,$password,"pritom_portfolio");
    } catch(Exception $e) {
        echo "<h2>Failed ! Try Again<h2>";
    }

    if($connection){
        echo "<h2>Login Successful</h2>";

        // Handle CREATE request
        if(isset($_POST['action']) && $_POST['action'] === 'create'){
            $table = $_POST['table'];
            unset($_POST['action'], $_POST['table'], $_POST['username'], $_POST['pass']);
            
            $columns = implode(",", array_keys($_POST));
            $values = implode("','", array_map('mysqli_real_escape_string', array_fill(0,count($_POST),$connection), array_values($_POST)));
            
            $sql = "INSERT INTO `$table` ($columns) VALUES ('$values')";
            mysqli_query($connection, $sql) or die(mysqli_error($connection));
            echo "<p style='color:green;'>Row added to $table ✅</p>";
        }

        // Handle DELETE request
        if(isset($_POST['action']) && $_POST['action'] === 'delete'){
            $table = $_POST['table'];
            $id = intval($_POST['id']); // assuming each table has `id`
            $sql = "DELETE FROM `$table` WHERE id=$id";
            mysqli_query($connection, $sql) or die(mysqli_error($connection));
            echo "<p style='color:red;'>Row deleted from $table ❌</p>";
        }

        // Step 1: Get all table names
        $tables = mysqli_query($connection, "SHOW TABLES");

        while($tableRow = mysqli_fetch_array($tables)){
            $tableName = $tableRow[0];
            echo "<h3>📌 Table: $tableName</h3>";

            // Step 2: Get all data from this table
            $result = mysqli_query($connection, "SELECT * FROM `$tableName`");

            if(mysqli_num_rows($result) > 0){
                echo "<table border='1' cellpadding='5' cellspacing='0'>";
                $fields = mysqli_fetch_fields($result);
                
                // Print headers
                echo "<tr>";
                foreach($fields as $field){
                    echo "<th>".$field->name."</th>";
                }
                echo "<th>Action</th>";
                echo "</tr>";

                // Print rows
                while($row = mysqli_fetch_assoc($result)){
                    echo "<tr>";
                    foreach($row as $key => $value){
                        if($key === "image" && !empty($value)){  
                            $base64 = base64_encode($value);
                            echo "<td><img src='data:image/jpeg;base64,$base64' width='100'></td>";
                        } else {
                            echo "<td>".htmlspecialchars($value)."</td>";
                        }
                    }
                    // Delete button (assuming each table has `id`)
                    echo "<td>
                            <form method='POST' style='display:inline;'>
                                <input type='hidden' name='username' value='$username'>
                                <input type='hidden' name='pass' value='$password'>
                                <input type='hidden' name='table' value='$tableName'>
                                <input type='hidden' name='id' value='".$row['id']."'>
                                <input type='hidden' name='action' value='delete'>
                                <button type='submit'>Delete</button>
                            </form>
                          </td>";
                    echo "</tr>";
                }
                echo "</table><br>";
            }

            // Create form (insert new row)
            echo "<h4>Add new row to $tableName:</h4>";
            echo "<form method='POST'>";
            foreach($fields as $field){
                if($field->name === "id") continue; // skip auto-increment id
                echo $field->name.": <input type='text' name='".$field->name."'><br>";
            }
            echo "<input type='hidden' name='username' value='$username'>";
            echo "<input type='hidden' name='pass' value='$password'>";
            echo "<input type='hidden' name='table' value='$tableName'>";
            echo "<input type='hidden' name='action' value='create'>";
            echo "<button type='submit'>Create</button>";
            echo "</form><br><br>";
        }
    }
}
    ?>
</body>
</html>