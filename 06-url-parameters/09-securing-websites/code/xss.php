<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./simple.css" />
    <title>Document</title>
</head>

<body>
    <pre><?php
            // Dump content of Associative array $_POST
            var_dump($_POST);

            function encodeInput($value)
            {
                // ENT_QUOTES = flag to convert both single & double quotes character into &quot;
                return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
            }
            ?></pre>

    <h1><?php if (!empty($_POST['firstname'])) echo encodeInput($_POST['firstname']); ?></h1>

    <form action="xss.php" method="POST">
        <input type="text" name="firstname" value="<?php if (!empty($_POST['firstname'])) echo encodeInput($_POST['firstname']); ?>" />
        <input type="submit" value="Submit!" />
    </form>

    <h2><?php if (!empty($_GET['book'])) echo encodeInput($_GET['book']); ?></h2>

    <?php $course = 'PHP course'; ?>
    <p><?php echo encodeInput($course); ?></p>

</body>

</html>