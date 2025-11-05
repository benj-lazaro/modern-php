<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./styles/simple.css" />
    <link rel="stylesheet" type="text/css" href="./styles/custom.css" />
    <title>Cities Explorer Deux</title>
</head>

<body>
    <header>
        <h1>
            <a href="index.php">Cities explorer</a>
        </h1>
        <p>Explore and find cities</p>
    </header>
    <main>
        <!-- From layout page 'main.view.php'; echoes the value of $contents from 'index.php' c/o render() -->
        <?php echo $contents; ?>
    </main>
    <footer>
        <p>
            Source of data: <a target="_blank" href="https://simplemaps.com/data/world-cities">https://simplemaps.com/data/world-cities</a>, <br />
            License: <a target="_blank" href="https://creativecommons.org/licenses/by/4.0/">CC BY 4.0 DEED, Attribution 4.0 International</a>.
        </p>
    </footer>
</body>

</html>