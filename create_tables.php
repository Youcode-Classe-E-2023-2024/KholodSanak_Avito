<?php
include("config.php");

// Select the created or existing database
mysqli_select_db($conn, 'avito_test');

// SQL to create table Client
$sql_create_table_client = "
CREATE TABLE IF NOT EXISTS Client (
    id_client INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    client_name VARCHAR(30) NOT NULL,
    client_phone VARCHAR(30) NOT NULL,
    client_email VARCHAR(50) NOT NULL,
    client_adr VARCHAR(50) NOT NULL,
    password VARCHAR(100) NOT NULL
)";

// Execute the SQL query to create the table
if (mysqli_query($conn, $sql_create_table_client)) {
    echo "Table Client created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}


// SQL to create table Annonce

$sql_create_table_annonce = "
CREATE TABLE IF NOT EXISTS Annonces (
    id_annonce INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(50) NOT NULL,
    description VARCHAR(500) NOT NULL,
    image VARCHAR(500) NOT NULL
)";

// Execute the SQL query to create the table
if (mysqli_query($conn, $sql_create_table_annonce)) {
    echo "Table Client created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}