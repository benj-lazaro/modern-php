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
            function e($value)
            {
                return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
            }

            $courses = [
                [
                    'title' => 'German for Beginners',
                    'desc' => 'Learn basic German vocabulary, grammar, and everyday phrases.',
                    'flag' => '🇩🇪',
                    'topics' => [
                        'Introduction to German Alphabet and Sounds',
                        'Basic Greetings and Farewells',
                        'Numbers and Counting',
                        'Common Verbs and Basic Sentence Structures',
                        'Everyday Phrases for Simple Conversations',
                        'Asking and Giving Directions',
                        'Food and Dining Vocabulary',
                        'Basic Grammar Rules: Articles and Cases'
                    ],
                ],
                [
                    'title' => 'French for Beginners',
                    'desc' => 'Master fundamental French skills including basic vocabulary and conversational techniques.',
                    'flag' => '🇫🇷',
                    'topics' => [
                        'Basics of French Pronunciation',
                        'Introducing Yourself and Others',
                        'Numbers, Time, and Dates',
                        'Everyday Phrases for General Conversations',
                        'Basic French Grammar: Subject-Verb Agreement',
                        'Travel-Related Vocabulary and Phrases',
                        'Food, Drinks, and Dining Out',
                        'Clothing and Shopping Vocabulary'
                    ]
                ],
                [
                    'title' => 'Spanish for Beginners',
                    'desc' => 'Acquire essential Spanish vocabulary and gain proficiency in daily conversations.',
                    'flag' => '🇪🇸',
                    'topics' => [
                        'Spanish Alphabets and Sounds',
                        'Basic Greetings and Introductions',
                        'Numbers and Basic Mathematics',
                        'Essential Phrases for Everyday Use',
                        'Common Verbs and Their Conjugations',
                        'Navigational Vocabulary: Directions and Locations',
                        'Basic Food Vocabulary and Ordering at a Restaurant',
                        'Understanding Gender and Articles in Spanish'
                    ]
                ]
            ];

            // Using foreach to iterate through the values (array elements) of the associate key 'topics'
            // foreach ($courses[2]['topics'] as $topic) {
            //     var_dump($topic);
            // }

            // Another way of iterating the values (array elements) of the associate key 'topics'
            $spanishCourse = $courses[2];
            foreach ($spanishCourse['topics'] as $topic) {
                var_dump($topic);
            }

            ?></pre>

    <!-- Nested foreach loop -->
    <?php foreach ($courses as $course): ?>
        <details>
            <summary><?php echo e($course['flag']); ?> <?php echo e($course['title']); ?></summary>
            <p><?php echo e($course['desc']); ?></p>
            <ul>
                <!-- Iterate through the values of the associate key 'topics' -->
                <?php foreach ($course['topics'] as $topic): ?>
                    <li><?php echo e($topic); ?></li>
                <?php endforeach; ?>
            </ul>
        </details>
    <?php endforeach; ?>

</body>

</html>