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

            // Manual implementation
            // $books = [
            //     'Harry Potter',
            //     'Lord of the Rings',
            //     'The Litte Prince',
            //     'Don Quixote',
            //     'Alice in Wonderland',
            // ];

            // $authors = [
            //     'J.K. Rowling',
            //     'J.R.R. Tolkien',
            //     'Antoine de Saint-Exupery',
            //     'Miguel de Cervantes',
            //     'Lewis Carroll',
            // ];

            // var_dump("{$books[0]} has been written by {$authors[0]}");

            // Associative array
            $books = [
                'Harry Potter' => 'J.K. Rowling',
                'Lord of the Rings' => 'J.R.R. Tolkien',
                'The Litte Prince' => 'Antoine de Saint-Exupery',
                'Don Quixote' => 'Miguel de Cervantes',
                'Alice in Wonderland' => 'Lewis Carroll',
            ];

            // Access the entire associative array
            var_dump($books);

            // Access a key's associated value
            var_dump($books['Harry Potter']);

            // Check existence of a key & if it NOT empty
            var_dump(!empty($books['Harry Potter']));

            // Check the existence of a key
            var_dump(isset($books['Harry Potter']));

            // Using a variable to store a key
            $key = 'Lord of the Rings';
            var_dump($books[$key]);

            // Using an expression to form a key
            $key = 'Don ' . 'Quixote';
            var_dump($books[$key]);
            ?></pre>

</body>

</html>