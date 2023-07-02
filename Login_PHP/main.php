<?php

$hostname = '127.0.0.1';
$username = 'shuja';
$password = 'pass';
$database = 'testdb';


$conn = new mysqli($hostname, $username, $password, $database);

if ($conn->connect_error) {
    die("EEEEE" . $conn->connect_error);
}

$name = $_POST["username"];
$password = $_POST["password"];


$sql = "create table users(name text not null, password text not null)";

if(mysqli_query($conn, $sql)) {
    echo "Created table successfully";
}
function signup($name, $password) {

    $sql = "insert into users(name, password) values('$name', '$password')";

    if(mysqli_query($GLOBALS['$conn'], $sql)){
        echo "|/";
    }
}

if(array_key_exists("btn_sup", $_REQUEST)) {
    signup($name, $password);
}



mysqli_commit($conn);


?>