<?php

    // $server_name = 'sql12.freemysqlhosting.net';
    // $username = 'sql12628749';
    // $password = '1Ym39imge9';
    // $database = 'sql12628749';
    // $port='3306';

    $server_name = 'localhost';
    $username = 'blackfire';
    $password = 'pass';
    $database = 'Business';


    $conn = new mysqli($server_name, $username, $password, $database);

    // Check Connection
    if($conn -> connect_error) {
        die("Connection failed: ".$conn ->connect_error);
    }

    // echo "Connected Successfully";



    $create_tbl_query = 'create table if not exists items(id int not null auto_increment, item_name varchar(100) not null, item_price varchar(100) not null, image varchar(100) not null, primary key(id));';



    if($conn->query($create_tbl_query) == FALSE) {
        // echo "Table Created Successfully!";
        echo "Error creating table! ".$conn->error;
    } 


    $create_admin_table = 'create table if not exists admin_creds(username varchar(100) not null, password varchar(100) not null)';

    $conn->query($create_admin_table);
  
    

    $create_customers_table = 'create table if not exists customers(id int not null auto_increment, f_name varchar(100) not null unique, l_name varchar(100) not null, username varchar(100) not null unique, email varchar(100) not null unique, password varchar(100) not null, primary key(id));';

    $conn->query($create_customers_table);


?>