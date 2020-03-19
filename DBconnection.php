<?php

try {
    //Connect to database
    $servername = "127.0.0.1";
    $usernameDB = "root";
    $passwordDB = "";
    $database = "radiokraeken";

    $conn = new PDO("mysql:host=$servername;dbname=$database", $usernameDB, $passwordDB);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
