<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gamedb";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Savienojuma kļūda: " . $conn->connect_error);
}
?>
