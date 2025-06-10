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
        $pageTitle = "PHP is amazing!";

        var_dump(isset($pageTitle));
        var_dump(empty($pageTitle));
        unset($pageTitle);
        ?></pre>

  <?php

  if (isset($pageTitle) && !empty($pageTitle))
    echo "<h1>{$pageTitle}</h1>";
  ?>
</body>

</html>