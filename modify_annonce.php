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
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Dashboard</title>
</head>
<body>


<!-- Modify Annonce Form -->


<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Modify Annonce</h2>
    </div>

    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
        <form class="space-y-6" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
            <div>
                <label for="annonce_id"  class="block text-sm font-medium leading-6 text-gray-900">Annonce ID to Modify </label>
                <div class="mt-2">
                    <input  name="annonce_id" type="text" autocomplete="annonce_id" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>
            <div>
                <label for="new_title"  class="block text-sm font-medium leading-6 text-gray-900">New Title</label>
                <div class="mt-2">
                    <input  name="new_title" type="text" autocomplete="new_title" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>
            <div>
                <label for="new_description"  class="block text-sm font-medium leading-6 text-gray-900"> New Description</label>
                <div class="mt-2">
                    <input  name="new_description" type="new_description" autocomplete="new_description" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>
            <div>
                <label for="new_image"  class="block text-sm font-medium leading-6 text-gray-900">New Image URL</label>
                <div class="mt-2">
                    <input  name="new_image" type="text" autocomplete="new_image" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>

            <div>
                <button type="submit" name="modify_annonce" value="Modify Annonce" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Submit</button>
            </div>
        </form>

    </div>

    <div>
        <a href="index.php">
            <span  class="text-xl"  >&lArr;</span> Back to Home
        </a>

    </div>
</body>
</html>


