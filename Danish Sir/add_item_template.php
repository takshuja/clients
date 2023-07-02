<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Item</title>

    <?php


    require_once 'connect_to_database.php';
    require_once 'header.php';




    $upload_ok = 0;
    $imageFileType = '';

    if (isset($_POST['upload'])) {
        $upload_dir = "uploads/";
        $upload_file = $upload_dir . basename($_FILES['file']['name']);
        $imageFileType = strtolower(pathinfo($upload_file, PATHINFO_EXTENSION));
        $check = getimagesize($_FILES['file']['tmp_name']);
        if ($check !== false) {
            echo("File is an image - " . $check["mime"] . ".");
            $upload_ok = 1;
        } else {
            echo("File is not an image!");
            $upload_ok = 0;
        }
        // $upload_dir . $_FILES['file']['name'];
        $product_image = $upload_dir . $_FILES['file']['name'];
        // if (file_exists($upload_file)) {
        //     echo('File Already Exists!');
        //     $upload_ok = 0;
        // } else {
        //     $upload_ok = 1;
        // }
    

        // Check if file exists
        if (file_exists($upload_file)) {
            echo('File already exists!');
            $upload_ok = 0;
        } else {
            $upload_ok = 1;
        }


        // Check File Size
        // if ($_FILES['file']['size'] > 500000) {
        //     echo('Sorry! your file is too large.');
        //     $upload_ok = 0;
        // }


        // Allow only certain formats (images)
        // $allowed_extensions = array('jpg', 'png', 'jpeg');
        // foreach ($allowed_extensions as $extension) {
        //     if ($extension != $imageFileType) {
        //         echo('Please select an image!');
        //         $upload_ok = 0;
        //     }
        // }
    }


    // 'create table if not exists items(id int not null auto_increment, item_name varchar(100) not null, item_price varchar(100) not null, image text, primary key(id));'
    

    if ($upload_ok == 0) {
        // echo("Error uploading file!");
    } else {
        move_uploaded_file($_FILES['file']['tmp_name'], $upload_file);
        $name = $_POST['name'];
        $price = $_POST['price'];
        $image = $product_image;
        $sql = "insert into items(item_name, item_price, image) values('$name', '$price', '$image');";
        $upload_query = $conn->query($sql);
        if ($upload_query) {
            echo('Upload Successful');
        } else {
            echo("ERROR");
        }
    }



    if(isset($_POST['delete'])) {
        $name = $_POST['name'];

        $sql = "select * from items where item_name='$name'";
        $result = $conn->query($sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

        if(mysqli_num_rows($result)>0){
            $path = $row['image'];
            unlink($path);
            echo $path;
        } else {
            echo mysqli_num_rows($result);
        }



        $sql = "delete from items where item_name='$name'";
        $result = $conn->query($sql);

        if($result) {
            echo "Delete Success!";
        } else {
            echo "Error: ".mysqli_error($conn);
        }
    }

    ?>


</head>

<body>
    <div class="container">
        <div class="form">
            <form action="" method="post" enctype="multipart/form-data">
                <input type="text" name="name" id="input" placeholder="Item Name">
                <input type="text" name="price" id="input" placeholder="Item Price">
                <input type="file" name="file" id="" accept="image/png, image/jpg, image/jpeg">
                <button type="submit" name='upload'>Submit</button>
            </form>
        </div>


        <div class="form">
        <form action="" method="post" enctype="multipart/form-data">
                <input type="text" name="name" id="input" placeholder="Item Name">
                <!-- <input type="text" name="price" id="input" placeholder="Item Price"> -->
                <!-- <input type="file" name="file" id=""> -->
                <button type="submit" name='delete'>Delete</button>
            </form>
        </div>
    </div>
</body>

</html>