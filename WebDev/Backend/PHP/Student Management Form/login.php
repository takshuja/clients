<?php


function alert($string)
{
    echo "<script type='text/javascript'>alert($string)</script>";
}

function uname_taken() {
    echo "<script type='text/javascript'>
                
        document.getElementById('uname_taken').style.display = 'inline';
    </script>";
}



$conn = new mysqli('localhost', 'shuja', 'pass', 'tutorialDB');

if ($conn->connect_error) {
    die("Connection Failed" . $conn->connect_error);
}


// echo "DB Connected\n";
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];


// echo "Welcome $name, your email is $email and your password is $password";


$sql = 'create table if not exists students(id int auto_increment not null, username varchar(100) not null, email varchar(100) not null, password varchar(100) not null, unique(username), unique(email), primary key(id));';

$conn->query($sql);


$query = "insert into students(username, email, password) values('$username', '$email', '$password')";
$conn->query($query);

if (mysqli_errno($conn) == 1062) {
    // echo "Username $username is already taken!";

    // alert("username already taken!");
    uname_taken();
    require('index.html');
} else {
    require('../../PHP/Signup\ Login\ Page/after_login.html');
}
