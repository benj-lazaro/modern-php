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

            // http://localhost/modern-php/06-url-parameters/03-$_get-arrray/code/get.php?book=%22Harry%20Potter%22&aurthor=%22JK%20Rowling%22

            var_dump($_GET);

            ?></pre>

    <?php if (!empty($_GET['book'])): ?>
        <h1><?php echo $_GET['book']; ?></h1>
    <?php endif; ?>

</body>

</html>