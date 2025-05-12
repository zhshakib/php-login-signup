<?php
    // use Your Database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "users";

    // Create Connection with try catch block
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Show a Console Log
        echo "<script>console.log('Database Connected Successfully!')</script>";
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
?>