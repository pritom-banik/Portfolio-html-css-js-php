<?php



$connection = mysqli_connect("Localhost","Portfolio-owner","2021","pritom_portfolio");

if(!$connection){
    die("Connection Failed: ". mysqli_connect_error());
}




// $query ='SELECT * FROM home';
// $result = mysqli_query($connection, $query);


// if ($result) {
//     while ($row = mysqli_fetch_assoc($result)) {
//         echo $row['title'] . "<br>";
//     }
// } else {
//     echo "Query failed: " . mysqli_error($connection);
// }


?>