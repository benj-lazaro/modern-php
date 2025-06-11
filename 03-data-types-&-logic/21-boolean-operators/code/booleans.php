<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="simple.css" />
  <title>Document</title>
  <style>
    h1 {
      width: 20rem;
      height: 10rem;
      background-color: lightgray;
    }
  </style>
</head>

<body>
  <pre><?php
        // Logical NOT
        echo "Logical NOT\n";
        var_dump(!true);
        var_dump(!false);
        echo "-----\n";

        // Logical AND
        echo "Logical AND\n";
        $views = 50000;

        if ($views >= 10000 && $views <= 100000) {
          echo "This is a medium performing video\n";
        }
        echo "-----\n";

        // Logical OR
        echo "Logical OR\n";
        var_dump(true || true);
        var_dump(true || false);
        var_dump(false || true);
        var_dump(false || false);
        echo "-----\n";

        // Logical XOR
        echo "Logical XOR\n";
        var_dump(true xor true);
        var_dump(true xor false);
        var_dump(false xor true);
        var_dump(false xor false);

        ?></pre>

</body>

</html>