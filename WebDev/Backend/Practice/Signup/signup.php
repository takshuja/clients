<?php
require('sql_connect.php');

function js($script)
{
    echo '<script type="text/javascript">'.$script.'</script>';
}

$name = $_POST['username'];
echo "<h1 style='color:white'>$name</h1>";

$sql = "insert into test(name) values('$name')";

$result = $conn -> query($sql);

$flag = false;

if($result) {
    js("document.getElementById('errMsg').style.display='none'");
}

if($conn->errno === 1062){
    $flag = true;
} 

if($name==null || $name == "") {
    js('document.getElementById("errMsg").innerHTML = "Name can not be null!"');
}


?>


<html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Signup</title>
        <link rel="stylesheet" href="style.css">
        <script src="script.js"></script>
    </head>
    
    <body>
        <div class="container">
            <form action="signup.php" method="post">
                <h3>Signup</h3>
                
                <label for="username">Username</label>
                <input type="text" name="username" id="">
                <p id="errMsg">Username already taken!</p>
                <label for="email"">Email</label>
                <input type=" text" name="email">
                <label for="password">Password</label>
                <input type="text" name="password" id="">
                <button>Signup</button>
                <p id="msg">Already have an account?<a href="#">Login</a></p>
                
            </form>
        </div>

        <?php
        // echo "alert_one()";
        // js("alert(1)");
        if($flag){

            echo "<script type='text/javascript'>document.getElementById('errMsg').style.display='inline';</script>";
        }
        else if($flag) {
            
            js("document.getElementById('errMsg').style.paddingLeft=50");
            js("document.getElementById('errMsg').style.color='green'");
            js("document.getElementById('errMsg').innerHTML='Login Successful!'");
            js("document.getElementById('errMsg').style.display='inline'");
        }
        ?>
</body>

</html>