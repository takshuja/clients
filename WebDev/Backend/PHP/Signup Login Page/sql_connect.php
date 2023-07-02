<?php

$hostname = "localhost";
$username = "shuja";
$password = "pass";
$dbname = "tutorialDB";


// creating connection
$conn = new mysqli($hostname, $username, $password, $dbname);


// checking the connection

if ($conn->connect_error) {
	die("Connection failed" . $conn->connect_error);
}



// checking login or signup

$name = $_POST["name"];
$password = $_POST["password"];


if ($_SERVER['REQUEST_METHOD'] === 'POST') {


	// isset -> predefined function. It provides click event. (onclick function)
	if (isset($_POST['login_button'])) {

		$sql = "select * from users where name='$name' and password='$password'";
		$result = $conn->query($sql);

		// -> = . but in classes

		if ($result->num_rows > 0) {
			require("after_login.html");
		} else {
			echo "Username OR Passwords Don't Match";
		}
	} else if (isset($_POST['signup_button'])) {
		$sql = "insert into users(name, password) values('$name', '$password')";

		if ($conn->query($sql)) {

			require('index.html');
		} else if (mysqli_errno($conn) == 1062) {
			echo "username already taken";
		}
	}
}
