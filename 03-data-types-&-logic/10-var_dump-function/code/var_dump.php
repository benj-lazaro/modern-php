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
        var_dump('Hello from a var_dump');

        $intVariable = 123;
        var_dump($intVariable);

        $floatVariable = 42.42;
        var_dump($floatVariable);

        $boolVariable = true;
        var_dump($boolVariable);

        // Implicitly converts string into an integer then perform math operation
        $mixedExpression = "4" + 5;
        var_dump($mixedExpression);
        ?></pre>
</body>

</html>