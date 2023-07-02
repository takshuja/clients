<?php

$host = 'localhost';
$user = 'blackfire';
$password = 'pass';
$database = 'tutorialDB';

$conn = new mysqli($host, $user, $password, $database);


if ($conn->connect_error) {
    die("Connection Failed!\nReason: " + $conn->connect_error);
}



$create_table = "
create table if not exists students
(
    id int not null auto_increment, 
    name varchar(100) not null, 
    phone varchar(100) not null, 
    email varchar(100) not null, 
    time varchar(100) not null,
    date varchar(100) not null,
    primary key(id), 
    unique(name), 
    unique(email)
)";



$conn->query($create_table);

if ($conn->error) {
    die("Error Executin Query!\nReason: " . $conn->error);
}




//$sql = "insert into";

function insertData($NAME, $PHONE, $EMAIL)
{

    $current_time = date('h:i:s a');
    $current_date = date('d-m-20y');
    $sql = "insert into students(name, phone, email, time, date) values('$NAME', '$PHONE', '$EMAIL', '$current_time', '$current_date')";

    $conn = $GLOBALS['conn'];
    $conn->query($sql);

    if ($conn->error) {
        die("ERROR: " . $conn->error);
    }

}

if (isset($_POST['register'])) {
    // echo "Button CLicked!";

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    insertData($name, $phone, $email);

    echo "<h3 style='color:green;display:block;text-align:center;'>Registration Successful.</h3>";
}

?>






























<!-- <!DOCTYPE html> -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;400&amp;display=swap" rel="stylesheet">
    <title>Student Portal</title>
</head>

<body>
    <!-- 12345678 -->
    <!-- krgh109 -->
    <h2>Welcome to the student registration portal</h2>
    <div class="container">
        <form action="index.php" method="post">
            <p>Register</p>

            <label for="name">Name</label>
            <input type="text" name="name" id="">
            <label for="phone">Phone</label>
            <input type="tel" name="phone" id="">
            <label for="email">Email</label>
            <input type="text" name="email" id="">

            <button name="register">Register</button>
        </form>
    </div>
</body>

</html>