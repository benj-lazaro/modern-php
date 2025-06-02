<?php
// Dynamically update the HTML document's title
$title = "PHP is amazing!";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
</head>

<body>
    <!-- Dynamically update the <h1> element's content -->
    <h1><?php echo $title ?></h1>
</body>

</html>