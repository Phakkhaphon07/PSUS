<?php
    $servername = "localhost";
    $username = "root";
    $password = "12345678";
    $DB_name = "svcstore";
    // Create connection
    $conn = new mysqli($servername, $username, $password,$DB_name);

    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
?>