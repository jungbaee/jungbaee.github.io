<?php
    define('DB_HOST', 'localhost');
    define('DB_USER', 'CSC680User');
    define("DB_PASS", '123456');
    define("DB_NAME", 'CSC_680_Project');

    //create connection using the predefined variables above
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    //$conn = new mysqli('localhost', 'CSC680User', '123456', 'CSC 680 Project');
    //checking connection
    if ($conn ->connect_error){
        die('Connection Failed'.$conn->connect_error);
    }

    //echo 'Connection succeeded!';
?>
