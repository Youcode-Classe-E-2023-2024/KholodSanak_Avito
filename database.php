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
$sql_create_db = "CREATE DATABASE IF NOT EXISTS myDB";
if (mysqli_query($conn, $sql_create_db)) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . mysqli_error($conn);
}

// Select the created or existing database
mysqli_select_db($conn, 'myDB');

// SQL to create table Client
$sql_create_table = "
CREATE TABLE IF NOT EXISTS Client (
    id_client INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    client_name VARCHAR(30) NOT NULL,
    client_phone VARCHAR(30) NOT NULL,
    client_email VARCHAR(50) NOT NULL,
    client_adr VARCHAR(50) NOT NULL,
    password VARCHAR(100) NOT NULL
)";

// Execute the SQL query to create the table
if (mysqli_query($conn, $sql_create_table)) {
    echo "Table Client created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

// SQL to create table Annonce

$sql_create_table1 = "
CREATE TABLE IF NOT EXISTS Annonce (
    id_annonce INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(50) NOT NULL,
    description VARCHAR(500) NOT NULL
)";

// Execute the SQL query to create the table
if (mysqli_query($conn, $sql_create_table1)) {
    echo "Table Client created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

// Function to hash password
function hashPassword($password) {
    return password_hash($password, PASSWORD_DEFAULT);
}

// SQL to insert values into the Client table
$sql_insert_values = "
INSERT INTO Client (client_name, client_phone, client_email, client_adr, password)
VALUES ('John Doe', '123456789', 'john.doe@example.com', '123 Main St', '" . hashPassword('password1') . "'),
       ('Jane Smith', '987654321', 'jane.smith@example.com', '456 Oak St', '" . hashPassword('password2') . "'),
       ('Bob Johnson', '5551234567', 'bob.johnson@example.com', '789 Pine St', '" . hashPassword('password3') . "')";

if (mysqli_query($conn, $sql_insert_values)) {
    echo "Values inserted successfully";
} else {
    echo "Error inserting values: " . mysqli_error($conn);
}


// Close the database connection
mysqli_close($conn);








