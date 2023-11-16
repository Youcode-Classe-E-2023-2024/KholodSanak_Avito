<?php
$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "";
$conn = "";

// Create connection
try {
    $conn = mysqli_connect($db_server, $db_user, $db_pass);
} catch (mysqli_sql_exception) {
    echo "Not connected: ";
}
if($conn){
    echo "You are connected !";
}
else{
    echo "Could not connect";
}

// Create database
$sql_create_db = "CREATE DATABASE IF NOT EXISTS avito_test";
if (mysqli_query($conn, $sql_create_db)) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . mysqli_error($conn);
}
