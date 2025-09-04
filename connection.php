<?php



$connection = mysqli_connect("Localhost","Portfolio-owner","2021","pritom_portfolio");

if(!$connection){
    die("Connection Failed: ". mysqli_connect_error());
}

?>