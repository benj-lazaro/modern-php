<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./simple.css" />
    <title>Document</title>
</head>

<body>
    <form action="include.php" method="GET">
        <select name="page">
            <option value="">Please select a recipe</option>
            <option value="citrus_salmon" <?php if (!empty($_GET['page']) && $_GET['page'] == 'citrus_salmon') echo 'selected' ?>>Citrus Symphony Salmon</option>
            <option value="mediterranian_pasta" <?php if (!empty($_GET['page']) && $_GET['page'] == 'mediterranian_pasta') echo 'selected' ?>>Mediterranean Marvel Pasta</option>
            <option value="sunset_risotto" <?php if (!empty($_GET['page']) && $_GET['page'] == 'sunset_risotto') echo 'selected' ?>>Sunset Risotto</option>
            <option value="tropical_tacos" <?php if (!empty($_GET['page']) && $_GET['page'] == 'tropical_tacos') echo 'selected' ?>>Tropical Tango Tacos</option>
        </select>
        <input type="submit" value="Submit!">
    </form>

    <?php
    $allowedPages = [
        'citrus_salmon',
        'mediterranian_pasta',
        'sunset_risotto',
        'tropical_tacos'
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

</body>

</html>