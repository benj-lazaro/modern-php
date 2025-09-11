<?php
// Set the server's response HTTP Status Code to 404
http_response_code(404);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo pathinfo($_SERVER['PHP_SELF'], PATHINFO_DIRNAME); ?>/simple.css">
    <title>Document</title>
</head>

<body>
    <header>
        <h1>News website</h1>
    </header>
    <main>
        <h2>Page not found!</h2>
    </main>
</body>

</html>