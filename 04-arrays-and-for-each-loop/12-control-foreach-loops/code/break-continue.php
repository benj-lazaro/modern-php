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

            $categories = [
                'Programming',
                'Business',
                'Art & Drawing',
                'Self improvement',
                'History',
            ];

            foreach ($categories as $category) {
                // Skips current target category & continue with the rest of the loop
                if ($category === 'Business') continue;
                if ($category === 'Art & Drawing') continue;

                // Stops the entire loop
                if ($category === 'Self improvement') break;

                var_dump($category);
            }
            ?></pre>

    <ul>
        <?php foreach ($categories as $category): ?>
            <?php if ($category === 'Business') continue; ?>
            <?php if ($category === 'Art & Drawing'): ?>
                <?php continue; ?>
            <?php endif; ?>
            <li><?php echo $category; ?></li>
        <?php endforeach; ?>
    </ul>

    <br />
    <br />
    <br />

</body>

</html>