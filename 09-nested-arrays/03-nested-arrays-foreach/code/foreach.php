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

            // Sanitize
            function e($value)
            {
                return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
            }

            $courses = [
                [
                    'title' => 'German for Beginners',
                    'desc' => 'Learn basic German vocabulary, grammar, and everyday phrases.',
                    'flag' => '🇩🇪'
                ],
                [
                    'title' => 'French for Beginners',
                    'desc' => 'Master fundamental French skills including basic vocabulary and conversational techniques.',
                    'flag' => '🇫🇷'
                ],
                [
                    'title' => 'Spanish for Beginners',
                    'desc' => 'Acquire essential Spanish vocabulary and gain proficiency in daily conversations.',
                    'flag' => '🇪🇸'
                ]
            ];

            // Access the corresponding values of the elements' associated keys
            foreach ($courses as $course) {
                var_dump($course['title']);
                var_dump($course['desc']);
                var_dump($course['flag']);
            }

            echo "-----------" . "<br />";

            // Specifically looping through the values of the 3rd element of the nested array
            // NOT using the associated keys
            foreach ($courses[2] as $value) {
                var_dump($value);
            }

            ?></pre>

    <!-- Render corresponding values of the nested array element into the HTML element <details> -->
    <?php foreach ($courses as $course): ?>
        <details>
            <summary><?php echo e($course['flag']); ?> <?php echo e($course['title']); ?></summary>
            <p><?php echo e($course['desc']); ?></p>
        </details>
    <?php endforeach; ?>

</body>

</html>