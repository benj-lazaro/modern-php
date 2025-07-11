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

            // Returns the length of the string value
            var_dump(strlen($text));

            // Returns a boolean value if the string value starts with the specified 'needle'
            var_dump(str_starts_with($text, 'PHP'));

            // Returns a boolean value if the string value ends with the specified 'needle'
            var_dump(str_ends_with($text, 'PHP'));

            // Lowercase all characters of the string value
            var_dump(strtolower($text));

            // Uppercase all character of the string value
            var_dump(strtoupper($text));

            // Capitilize the 1st character of the string value
            var_dump(ucfirst('php'));

            // Removes the specified characters '-' & '.' from the value value
            var_dump(trim('   jannis    .-', "-."));

            // Removes whitespace surrounding the string value
            var_dump(trim('   jannis    '));

            // Removes whitespace from the end of the string value
            var_dump(rtrim('   jannis    '));

            // Removes whitespace from the beginning of the string value
            var_dump(ltrim('   jannis    '));

            // Returns the position (int) of the 1st occurrence of the 'needle' from the string value
            var_dump(strpos($text, 'PHP'));

            // Returns the position of the next occurrence of the 'needle' after the 1st character
            var_dump(strpos($text, 'PHP', 1));

            // Returns 'false' due to the non-existent 'needle' from the string value
            var_dump(strpos($text, 'javascript'));

            ?></pre>
</body>

</html>