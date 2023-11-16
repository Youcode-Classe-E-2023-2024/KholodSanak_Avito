<?php
include("config.php");

// Select the created or existing database
mysqli_select_db($conn, 'avito_test');

// Handle add, modify, or delete annonces logic here
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete_annonce"])) {
// Delete annonce logic goes here
    $annonce_id_to_delete = mysqli_real_escape_string($conn, $_POST["annonce_id_to_delete"]);

    $sql_delete_annonce = "DELETE FROM annonces WHERE id_annonce='$annonce_id_to_delete'";
    $result_delete_annonce = mysqli_query($conn, $sql_delete_annonce);

    if ($result_delete_annonce) {
        echo "Annonce deleted successfully!";
    } else {
        echo "Error deleting annonce: " . mysqli_error($conn);
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

<!-- Delete Annonce Form -->
<h3>Delete Annonce</h3>
<form method="post" action="delete_annonce.php">
    <label for="annonce_id_to_delete">Annonce ID to Delete:</label>
    <input type="text" name="annonce_id_to_delete" required>

    <input type="submit" name="delete_annonce" value="Delete Annonce">
</form>
<p><a href="index.php">Back to Home</a></p>
</body>
</html>