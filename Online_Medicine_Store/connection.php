<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "medicine_store";

$connection = mysqli_connect($servername, $username, $password, $dbname);

if ($connection) {
    //  echo "success";
} else {
    die("Connection faild." . mysqli_connect_error());
}
?>