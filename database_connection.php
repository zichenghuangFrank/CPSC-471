<?php

$servername = "localhost";
$serverusername	= "root";
$password	= "";
$dbname		= "sad";

$conn = new mysqli($servername,$serverusername,$password,$dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
