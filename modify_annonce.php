<?php
include("config.php");

// Select the created or existing database
mysqli_select_db($conn, 'avito');

/*
 * ($_SERVER["REQUEST_METHOD"] == "POST") checks if the current request method is "POST."
 * checks if the form has been submitted with the button named "modify_annonce."
 */
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["modify_annonce"])) {

    // Sanitize user input: Escape special characters in the "title" received from a form POST request
    $annonce_id = mysqli_real_escape_string($conn, $_POST["annonce_id"]);
    $new_title = mysqli_real_escape_string($conn, $_POST["new_title"]);
    $new_description = mysqli_real_escape_string($conn, $_POST["new_description"]);
    $new_image = mysqli_real_escape_string($conn, $_POST["new_image"]);

    // Update annonce
    $sql_modify_annonce = "UPDATE annonces SET title='$new_title', description='$new_description', image='$new_image' WHERE id_annonce='$annonce_id'";
    $result_modify_annonce = mysqli_query($conn, $sql_modify_annonce);

    if ($result_modify_annonce) {
        echo "Annonce modified successfully!";
    } else {
        echo "Error modifying annonce: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>

<h2>Welcome to the Dashboard</h2>

<!-- Modify Annonce Form -->
<h3>Modify Annonce</h3>
<form method="post" action="modify_annonce.php">
    <label for="annonce_id">Annonce ID to Modify:</label>
    <input type="text" name="annonce_id" required>

    <label for="new_title">New Title:</label>
    <input type="text" name="new_title" required>

    <label for="new_description">New Description:</label>
    <textarea name="new_description" required></textarea>

    <label for="new_image">New Image URL:</label>
    <input type="text" name="new_image" required>

    <input type="submit" name="modify_annonce" value="Modify Annonce">
</form>
<p><a href="index.php">Back to Home</a></p>
</body>
</html>


