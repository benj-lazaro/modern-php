<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/simple.css" />
    <link rel="stylesheet" href="./styles/custom.css" />
    <title>Culinary Cove<?php if (!empty($pageTitle)): ?> &bull; <?php echo $pageTitle; ?><?php endif; ?></title>
</head>

<body>
    <?php if (empty($headerImg)) $headerImg = 'images/pexels-engin-akyurt-1435904.jpg'; ?>

    <header class="header-with-background" style="background-image: url('<?php echo $headerImg; ?>'); ">
        <h1>Culinary Cove</h1>
        <p>Your sanctuary for exceptional flavors</p>
        <nav>
            <a <?php if (!empty($pageKey === "mission")): echo 'class="active" ';
                endif; ?>href="our-mission.php">Our mission</a>
            <a <?php if (!empty($pageKey === "ingredients")): echo 'class="active" ';
                endif; ?>href="ingredients.php">Ingredients</a>
            <a <?php if (!empty($pageKey === "menu")): echo 'class="active" ';
                endif; ?>href="menu.php">Our menu</a>
        </nav>
    </header>

    <main>