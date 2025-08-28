<?php
// var_dump($_POST);
var_dump($_FILES);
var_dump(__DIR__ . '/' . $_FILES['image']['name']);

// Check if a file has been uploaded
if (!empty($_FILES) && !empty($_FILES['image'])):
    // Check if the image's 'error' is set to 0 & 'size' is NOT 0
    if ($_FILES['image']['error'] === 0 && $_FILES['image']['size'] !== 0):
        // Get submitted file's filename, extension excluded
        $nameWithoutExtension = pathinfo($_FILES['image']['name'], PATHINFO_FILENAME);

        // Search for characters that is NOT a lower/uppercase 'a' to 'z' or number 0 to 9; replace with '' if found
        $name = preg_replace('/[^a-zA-Z0-9]/', '', $nameWithoutExtension);

        // Update filename & extension of submitted file; adds a UNIX timestamp to the filename
        move_uploaded_file($_FILES['image']['tmp_name'], __DIR__ . '/' . $name . '-' . time() . '.jpg');
    endif;
endif;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="POST" action="index.php" enctype="multipart/form-data">
        <input type="file" name="image">
        <input type="submit" value="Submit!">
    </form>
</body>

</html>