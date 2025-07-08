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

            require_once __DIR__ . '/inc/functions.inc.php';

            $text = "PHP, short for \"Hypertext Preprocessor\", is a server-side scripting language first introduced in 1994 by Rasmus Lerdorf. Distributed under a permissive license, PHP is open-source, allowing both personal and commercial use at no cost. It's a cross-platform language, compatible with various server operating systems like Linux, Windows, and macOS, making it highly versatile. The language boasts a large and supportive community, offering an extensive range of libraries, frameworks, and online resources, which has made it a staple for developing dynamic websites and web applications. One of its significant advantages is its seamless integration with relational databases such as MySQL.\nPHP is designed with a syntax that many find user-friendly, although the ease of learning can be subjective and vary from person to person. The language allows for efficient coding; tasks like outputting text can be performed with simple commands like echo. Variables are easily declared, and PHP offers a comprehensive set of control structures, including conditional statements and loops, providing a balance between simplicity and functionality.\nWhile PHP is most commonly used for server-side web development, its capabilities extend beyond that scope. The language has evolved to include command-line scripting and even the creation of desktop applications. However, its primary utility remains in server-side scripting, making it a robust and flexible choice for everything from small websites to complex web-based applications.";

            // Returns a paragraph of text into an array of string elements delimited by a "\n"
            $splitted = explode("\n", $text);
            var_dump($splitted);

            // Merges array elements into a single string with each element separated with a "----"
            $merged = implode("----", $splitted);
            var_dump($merged);
            ?></pre>

    <!-- Outputs individual elements of the array as content for individual <p> element -->
    <?php foreach ($splitted as $segment): ?>
        <p><?php echo e($segment); ?></p>
    <?php endforeach; ?>

    <!-- Explode string input into array elements seperated by "\n" -->
    <!-- Then integrate each element as content for individual <li> element -->
    <ul>
        <li>
            <?php echo implode("</li><li>", explode("\n", e($text))); ?>
        </li>
    </ul>


</body>

</html>