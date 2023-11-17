<?php
include("config.php");

// Select the created or existing database
mysqli_select_db($conn, 'avito');

// Handle add annonces
// ($_SERVER["REQUEST_METHOD"] == "POST") checks if the current request method is "POST."
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //checks if the form has been submitted with the button named "add_annonce."
    if (isset($_POST["add_annonce"])) {
        // Sanitize user input: Escape special characters in the "title" received from a form POST request
        $title = mysqli_real_escape_string($conn, $_POST["title"]);
        $description = mysqli_real_escape_string($conn, $_POST["description"]);
        $image = mysqli_real_escape_string($conn, $_POST["image"]);
        // Add annonce
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
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Dashboard</title>
</head>
<body>

<h2>Welcome to the Dashboard</h2>

<!-- Add Annonce Form -->

<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Add Annonce</h2>
    </div>

    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
        <form class="space-y-6" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
            <div>
                <label for="title"  class="block text-sm font-medium leading-6 text-gray-900">Annonce title</label>
                <div class="mt-2">
                    <input  name="title" type="text" autocomplete="title" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>
            <div>
                <label for="description"  class="block text-sm font-medium leading-6 text-gray-900">Description</label>
                <div class="mt-2">
                    <input  name="description" type="description" autocomplete="description" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>
            <div>
                <label for="image"  class="block text-sm font-medium leading-6 text-gray-900">Image URL</label>
                <div class="mt-2">
                    <input  name="image" type="text" autocomplete="image" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>

            <div>
                <button type="submit" name="add_annonce" value="Add Annonce" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Submit</button>
            </div>
        </form>

</div>


<p><a href="index.php">Back to Home</a></p>
</body>
</html>
