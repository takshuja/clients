<?php
$servername = "127.0.0.1";
$username = "root";
$password = "root";
$db = "testdb";
// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";

$name = $_POST["name"];
$pass = $_POST["password"];

if (isset($_POST['btnSup'])) {
    signup();
}

if (array_key_exists("btnLgn", $_REQUEST)) {
    login();
}


$sql = "CREATE TABLE Users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
password VARCHAR(30) NOT NULL,
";

if (mysqli_query($conn, $sql)) {
    echo "Created Table Users Successfully!";
} else {
    // echo "Error creating table";
}

function signup()
{

    $sql = "insert into users(name, password) values('$name', '$pass')";

    if (mysqli_query($GLOBALS['conn'], $sql)) {
        mysqli_commit($GLOBALS['conn']);
        echo "Signup Successful";
    } else {
        echo "Error: " . mysqli_error($GLOBALS['conn']);
    }

}


function login()
{
    $sql = "Select * from users where (name='$name' and password='$pass')";
    if (mysqli_query($GLOBALS['conn'], $sql)) {
        echo "Login Successful<br />";


    } else {
        echo "Error: " . mysqli_error($GLOBALS['conn']);
    }
    $query = "SELECT * FROM users";

    if ($res = mysqli_query($GLOBALS['conn'], $query)) {

        //printf("Select query returned %d rows.\n", $res->num_rows);

        while ($row = $res->fetch_row()) {
            echo $row[0];
            echo "\n";
            echo $row[1];
            //  printf("%s %s %s\n", $row[0], $row[1]);
        }

        $res->close();
    } else {

        echo "failed to fetch data\n";
    }

    # $con->close();
    # close($conn);
}




?>