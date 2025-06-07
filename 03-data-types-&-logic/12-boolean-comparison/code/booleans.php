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
        // Boolean values
        var_dump(true);
        var_dump(false);

        echo "------\n";
        // Comparison operators
        echo "Comparison operators \n";
        $firstOperand = 42;
        var_dump($firstOperand > 13);
        var_dump($firstOperand < 13);
        var_dump($firstOperand >= 13);
        var_dump($firstOperand <= 13);
        // var_dump((40 + 2) > 13);

        echo "------\n";
        $name = 'John Wick';
        var_dump($name === 'John Wick');
        var_dump($name !== 'John Wick');

        $age = 59;
        var_dump($age === 59);  // Checks for the equality of the value & data type
        var_dump($age === '59');

        var_dump($age == '59'); // Checks for the equality of the value
        var_dump($age != '59');

        ?></pre>
</body>

</html>