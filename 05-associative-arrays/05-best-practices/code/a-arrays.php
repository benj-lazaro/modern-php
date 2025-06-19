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
            $books = [
                'Harry Potter' => 'J.K. Rowling',
                'Lord of the Rings' => 'J.R.R. Tolkien',
                'The Litte Prince' => 'Antoine de Saint-Exupery',
                'Don Quixote' => 'Miguel de Cervantes',
                'Alice in Wonderland' => 'Lewis Carroll',
                0 => 'This is book #0',
                'Another book',
            ];

            var_dump($books);

            // Accessing a value by its numeric index key element
            var_dump($books['0']);
            var_dump($books[1]);

            ?></pre>

</body>

</html>