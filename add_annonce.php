<?php
include("config.php");

// Select the created or existing database
mysqli_select_db($conn, 'avito_test');

// Handle add, modify, or delete annonces logic here
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["add_annonce"])) {
        // Add annonce logic goes here
        $title = mysqli_real_escape_string($conn, $_POST["title"]);
        $description = mysqli_real_escape_string($conn, $_POST["description"]);
        $image = mysqli_real_escape_string($conn, $_POST["image"]);

        $sql_add_annonce = "INSERT INTO Annonces (title, description, image) VALUES ('$title', '$description', '$image')";
        $result_add_annonce = mysqli_query($conn, $sql_add_annonce);

        if ($result_add_annonce) {
            echo "Annonce added successfully!";
        } else {
            echo "Error adding annonce: " . mysqli_error($conn);
        }
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

<!-- Add Annonce Form -->
<h3>Add Annonce</h3>
<form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
    <label for="title">Title:</label>
    <input type="text" name="title" required>

    <label for="description">Description:</label>
    <textarea name="description" required></textarea>

    <label for="image">Image URL:</label>
    <input type="text" name="image" required>

    <input type="submit" name="add_annonce" value="Add Annonce">
</form>
</body>
</html>
