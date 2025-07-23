<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="./simple.css" />
</head>

<body>
    <pre><?php
            // Dumps the value from 0 to 10
            for ($x = 0; $x <= 10; $x = $x + 1) {
                var_dump($x);
            }

            echo "----- <br />";

            // Single line "for" loop expression; NOT best practice
            // for ($x = 0; $x <= 10; $x = $x + 1) var_dump($x);

            // Shorter increment expression
            for ($x = 0; $x <= 10; $x++) {
                var_dump($x);
            }

            echo "----- <br />";

            // Increments by 2
            for ($x = 0; $x <= 10; $x += 2) {
                var_dump($x);
            }

            echo "----- <br />";

            // Infinite loop; conditional evaluates to "true" indefinitely
            /*
            for ($x = 0; $x >= -10; $x++) {
                var_dump($x);
            }
            */

            ?></pre>

    <!-- List numbers from 0 to 49; skips the number  -->
    <ul>
        <?php for ($number = 0; $number <= 100; $number++): ?>
            <?php if ($number === 10) continue; ?>
            <?php if ($number === 50) break; ?>
            <li>
                <?php echo $number; ?>
            </li>
        <?php endfor; ?>
    </ul>

</body>

</html>