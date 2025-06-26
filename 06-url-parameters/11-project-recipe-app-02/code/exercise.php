<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./simple.css" />
    <title>Document</title>
</head>

<body>
    <?php

    function e($value)
    {
        return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
    }

    $allowedPages = [
        'citrus_salmon' => 'Citrus Symphony Salmon',
        'mediterranian_pasta' => 'Mediterranean Marvel Pasta',
        'sunset_risotto' => 'Sunset Risotto',
        'tropical_tacos' => 'Tropical Tango Tacos',
    ];

    if (!empty($_GET['page'])) {
        $requestedPage = $_GET['page'];

        // Load allowed sub-page(s) ONLY
        if (in_array($requestedPage, $allowedPages)):
            echo file_get_contents("pages/{$_GET['page']}.html");
        else:
            echo "<h1>Requested recipe NOT available</h1>";
        endif;
    }
    ?>

    <form action="exercise.php" method="GET">
        <select name="page">
            <option value="">Please select a recipe</option>
            <?php
            foreach ($allowedPages as $page => $label): ?>
                <option value="<?php echo e($page); ?>"><?php echo e($label); ?></option>
            <?php
            endforeach;
            ?>
        </select>
        <input type="submit" value="Submit!">
    </form>

</body>

</html>