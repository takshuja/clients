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
            height: 550px;
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
            margin-bottom: 20px;
            font-size: 46px;
            font-family: 'Sacramento', cursive;
        }


        .text-fields {
            display: flex;
            /* border: 5px solid green; */
            margin: 10px 0;
            flex-direction: column;
            justify-content: center;
        }


        #f_name, #l_name, #uname, #pwd, #email {
            margin: 17px 0;
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
            margin-top: 30px;
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

        if(isset($_POST['signup_btn'])) {
            $f_name = $_POST['f_name'];
            $l_name = $_POST['l_name'];
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];


            $sql = "insert into customers(f_name, l_name, username, email, password) values('$f_name', '$l_name', '$username', '$email', '$password')";

            $result = $conn->query($sql);
            
            if($result) {
                alert('Success');
                js("window.location.href='login.php'");
                die();
            } else {
                alert('Error');
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
                <input type="text" name="f_name" id="f_name" placeholder="first name">
                <input type="text" name="l_name" id="l_name" placeholder="last name">
                <input type="text" name="username" id="uname" placeholder="username">
                <input type="email" name="email" id="email" placeholder="email">
                <input type="password" name="password" id="pwd" placeholder="password">
            </div>
            <div class="buttons">
                <button type="submit" name="signup_btn" >Signup</button>
            </div>
            <div class="signup-msg">
                Dont have an account? 
                    <a href="login.php">Login</a>
            </div>
        </form>
    </div>



</body>

</html>