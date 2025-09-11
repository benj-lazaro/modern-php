<?php
// Sanitize user input/output
function e($value)
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

// Retrieve integer value passed to the URL parameter 'id'; otherwise return a 1
$id = (!empty($_GET['id']) ? (int) $_GET['id'] : 1);

// Craft an error page
if ($id >= 5):
    require __DIR__ . '/notfound.php';
    die();
endif;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./simple.css" />
    <title>Document</title>
</head>

<body>
    <header>
        <h1>News website</h1>
    </header>
    <main>
        You were accessing the article with the ID: <?php echo e($id); ?>.
    </main>
</body>

</html>