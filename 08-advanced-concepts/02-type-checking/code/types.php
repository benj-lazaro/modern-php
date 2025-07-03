<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./simple.css" />
    <title>Document</title>
</head>

<body>
    <pre><?php

            $number = 15.0;
            $str = 'PHP';

            echo "\$number = $number <br />";
            echo "\$str = $str <br />";

            var_dump($number);
            var_dump($str);

            echo "is_bool($number) => ";
            var_dump(is_bool($number));

            echo "is_integer($number) => ";
            var_dump(is_integer($number));

            echo "is_float($number) => ";
            var_dump(is_float($number));

            echo "is_numeric($number) => ";
            var_dump(is_numeric($number));

            echo "is_sting($number) => ";
            var_dump(is_string($number));

            echo "is_array($number) => ";
            var_dump(is_array($number));

            // NOTE: This type of array is NOT encouraged; various type of elements
            $entries = [
                ['title' => 'The most famous band!'],
                ['title' => 'The most popular group!'],
                'A classical concert'
            ];

            // Iterates through the elements of $entries & output according to type
            foreach ($entries as $entry) {
                if (is_array($entry)) {
                    var_dump($entry['title']);
                } else {
                    var_dump($entry);
                }
            }

            ?></pre>
</body>

</html>