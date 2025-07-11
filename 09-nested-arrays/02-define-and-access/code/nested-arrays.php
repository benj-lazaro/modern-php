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

            /* $courses = [
                'German for Beginners',
                'French for Beginners',
                'Spanish for Beginners'
            ];

            $coursesDesc = [
                'Learn basic German vocabulary, grammar, and everyday phrases.',
                'Master fundamental French skills including basic vocabulary and conversational techniques.',
                'Acquire essential Spanish vocabulary and gain proficiency in daily conversations.'
            ];

            $coursesFlags = [
                '🇩🇪',
                '🇫🇷',
                '🇪🇸'
            ];*/

            // Nested array 

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


            // Access the title & flag of the 1st course
            var_dump($courses[0]['title']);
            var_dump($courses[0]['flag']);

            // Specifies the course to access (i.e. 2nd course)
            $spanishCourse = $courses[2];
            // Access the corresponding associated key (i.e. title & flag)
            var_dump($spanishCourse['title']);
            var_dump($spanishCourse['flag']);

            ?></pre>
</body>

</html>