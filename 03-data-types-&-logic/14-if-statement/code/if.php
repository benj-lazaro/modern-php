<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="simple.css" />
  <title>Document</title>
</head>

<body>
  <pre><?php
        include 'vars.php';

        if ($serverStatus === "ok") {
          echo "Test Ping\n";
          echo "Welcome to our website! Browser and enjoy our content.";
        }

        if ($serverStatus === "maintenance") {
          echo "Test Ping\n";
          echo "We're currently undergoing maintenance. Please check back later.";
        }
        ?></pre>
</body>

</html>