<?php
include("config.php");

// Select the created or existing database
mysqli_select_db($conn, 'avito');

/*
 * ($_SERVER["REQUEST_METHOD"] == "POST") checks if the current request method is "POST."
 * checks if the form has been submitted with the button named "delete_annonce."
 */
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete_annonce"])) {

    // Sanitize user input: Escape special characters in the "title" received from a form POST request
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
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Dashboard</title>
</head>
<body>

<h2>Welcome to the Dashboard</h2>

<!-- Delete Annonce Form -->


<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Delete Annonce</h2>
    </div>

    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
        <form class="space-y-6" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
            <div>
                <label for="annonce_id_to_delete"  class="block text-sm font-medium leading-6 text-gray-900">Annonce ID to Delete </label>
                <div class="mt-2">
                    <input  name="annonce_id_to_delete" type="text" autocomplete="annonce_id_to_delete" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>
            <div>
                <button type="submit" name="delete_annonce" value="Delete Annonce" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Submit</button>
            </div>

        </form>

</div>


<p><a href="index.php">Back to Home</a></p>
</body>
</html>