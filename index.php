<?php

include("config.php");

// Select the created or existing database
mysqli_select_db($conn, 'avito');

// Fetch annonces from the database
$sql_fetch_annonces = "SELECT * FROM Annonces";
$result_fetch_annonces = mysqli_query($conn, $sql_fetch_annonces);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Annonces</title>
    <style>
body {
    font-family: Arial, sans-serif;
            margin: 20px;
        }

        h2 {
    text-align: center;
        }

        .annonces-container {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
        }

        .annonce {
    border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }

        .annonce img {
    max-width: 100%;
            height: auto;
            margin-bottom: 10px;
        }

        p {
    margin: 0;
}

        a {
    text-decoration: none;
            color: #3498db;
            font-weight: bold;
        }

        a:hover {
    color: #2980b9;
}
        .buttons{
            display: flex;
            flex-direction: row-reverse;
        }
    </style>
</head>
<body>

<section class="buttons">
    <button id="btn" onclick="location.href='add_annonce.php'"> Add annonce</button>
    <button id="btn" onclick="location.href='modify_annonce.php'"> Modify annonce</button>
    <button id="btn" onclick="location.href='delete_annonce.php'"> Delete annonce</button>
</section>

<h2>List of Annonces</h2>

<div class="annonces-container">
    <?php
    // checks $result_fetch_annonces execution was successful
    if ($result_fetch_annonces) {
        /*
         * while loop iterates over each row in the $result_fetch_annonces.
         *  The mysqli_fetch_assoc function fetches the next row from the result set as an associative array,
         * and the loop continues as long as there are rows to fetch.
         */
        while ($row = mysqli_fetch_assoc($result_fetch_annonces)) {
            echo "<div class='annonce'>";
            echo "<h3>" . $row["title"] . "</h3>";
            echo "<img src='{$row["image"]}' alt='Annonce Image'>";
            echo "<p>" . $row["description"] . "</p>";
            echo "</div>";
        }
    } else {
        echo "No annonces available.";
    }
    ?>
</div>


</body>
</html>
