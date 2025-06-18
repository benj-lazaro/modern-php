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
            ];

            // Add a new element 
            $books['Romeo and Julia'] = 'William_Shakespeare';
            $books['Romeo and Julia'] = 'William Shakespeare'; // Overrides recent associated value
            var_dump($books);

            // Remove an element
            unset($books['Harry Potter']);
            var_dump($books);

            // Determine the number of elements
            var_dump(count($books));

            // Iterate through the array's values ONLY
            foreach ($books as $book) {
                var_dump($book);
            }
            echo "<br />";

            // Iterate through the keys & its associated value
            foreach ($books as $key => $value) {
                var_dump($key);
                var_dump($value);
            }

            // Retrieve all keys ONLY
            $arrayKeys = array_keys($books);
            var_dump($arrayKeys);

            // Retrieve all values ONLY
            $arrayValues = array_values($books);
            var_dump($arrayValues);

            ?></pre>

</body>

</html>