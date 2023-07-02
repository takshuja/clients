<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Pacifico&family=Sacramento&family=Ubuntu+Mono&display=swap');
        .container {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            padding: 30px;
            height: 500px;
            width: 325px;
            border-radius: 12px;
            box-shadow: 5px 5px 20px gray, -5px -5px 20px gray;
            border: 1px solid black;
            
        }

        .login-form {
            display: flex;
            /* border: 1px solid blue; */
            padding: 10px;
            flex-direction: column;
        }

        .text-label {
            display: block;
            text-align: center;
            /* border: 1px solid red; */
            margin-bottom: 50px;
            font-size: 40px;
            font-family: 'Sacramento', cursive;
        }


        .text-fields {
            display: flex;
            /* border: 5px solid green; */
            margin: 10px 0;
            flex-direction: column;
            justify-content: center;
        }


        #uname, #pwd {
            margin: 20px 0;
            height: 30px;
            border: none;
            border-bottom: 1px solid black;
            outline: none;
            font-size: 24px;

        }

        ::placeholder {
            color: #1b1b1b;

        }


        .buttons {
            display: flex;
            justify-content: center;
            margin-top: 40px;
        }

        .buttons button {
            font-size: 20px;
            border-radius: 10px;
            border: none;
            background-color: skyblue;
            height: 50px;
            width: 240px;
            border: 1px solid black;
        }


        .buttons button:hover {
            background-color: rgb(116, 177, 201);
        }


        .signup-msg {
            /* border: 1px solid red; */
            margin: auto;
            margin-top: 40px;
            font-size: 18px;
            font-family: 'Pacifico', cursive;
        }
    </style>

</head>

<?php

        require_once 'connect_to_database.php';
        require_once 'header.php';

        if(isset($_POST['login-btn'])) {

            $username = $_POST['username'];
            $password = $_POST['password'];

            $sanitized_username = mysqli_escape_string($conn, $username);
            $sanitized_password = mysqli_escape_string($conn, $password);

            $sql = "select * from customers where (username='$sanitized_username' or email='$username') and password='$sanitized_password'";

            $result = $conn->query($sql);

            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

            $count = mysqli_num_rows($result);

            if(!$count) {
                alert('Incorrect login credentials!\nTry Again.');
            } else  {
                js("window.location.href='customer.php'");
            }

        }

?>



<body>
    <div class="container">
        <form action="" method="post" class="login-form">
            <div class="text-label">
                Login
            </div>
            <div class="text-fields">
                <input type="text" name="username" id="uname" placeholder="username or email">
                <input type="password" name="password" id="pwd" placeholder="password">
            </div>
            <div class="buttons">
                <button type="submit" name="login-btn">Login</button>
            </div>
            <div class="signup-msg">
                Dont have an account? 
                    <a href="signup.php">Sign Up</a>
            </div>
        </form>
    </div>



</body>

</html>