<?php

require('sql_connect.php');

$name = $_POST['username'];

// echo "<script type='text/javascript'>document.getElementById('x').style.color = 'red';</script>";
$sql = "insert into test(name) values('$name')";

$err = false;

if ($conn->query($sql)) {
    echo "|/";
    // echo "<p style='color:white';>HELLO, WORLD!</p>";
} else if ($conn->errno == 1062) {
    // echo "<p style='color:green';>$conn->errno</p>";
    $err = true;
}

?>


<html>

<head>
    <title>Signup</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>


    <style>
        #err {
            color: red;
            display:none;
        }
    </style>


</head>

<body>
    <form action="main.php" method="post">
        <label for="username" id="x">Username</label>
        <p class='error' id='err'>Username already taken!</p>
        <input type="text" name="username" id="">
        <button>Submit</button>
    </form>

    <?php
    if ($err) {
        echo "<script type='text/javascript'>document.getElementById('err').style.display = 'inline';</script>";
    } else if (!$err) {
        echo "<script type='text/javascript'>document.getElementById('err').style.display = 'none';</script>";
    }

    ?>
</body>

</html>