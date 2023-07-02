<?php


$conn = new mysqli('localhost', 'shuja', 'pass', 'tutorialDB');

if($conn->connect_error) {
    die("Connection failed!\nReason: " . $conn->connect_error);
}

?>