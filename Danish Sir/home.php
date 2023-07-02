<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <?php echo "<link rel='stylesheet' href='style.css'>"; ?>

<body>


    <header id="header">
        <div class="navBar">
            <div class="logo">
                Delight d' Heaven
            </div>
            <div class="navLinks">
                <a href="admin.php" id="navlink">Admin</a>
                <a href="" id="navlink">Contact</a>
                <a href="login.php" id="navButton">Login</a>
                <a href="signup.php" id="navButton">Signup</a>
            </div>
        </div>
    </header>

    <?php
    require_once 'connect_to_database.php';
    require_once 'header.php';


    $sql = "select * from items";

    $result = $conn->query($sql);

    echo '<div class="items">';
    while ($row = $result->fetch_assoc()) {
        $name = $row["item_name"];
        $price = $row["item_price"];
        $img_src = $row["image"];
        include 'item_template.php';
    }
    echo '</div>';
    ?>

</body>

</html>