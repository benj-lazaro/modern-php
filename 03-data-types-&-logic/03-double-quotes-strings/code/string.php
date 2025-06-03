<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="simple.css" />
  <title>Document</title>
</head>

<body>
  <pre>
<?php
// Removes the need for the escape character \ to include a ' in the string
$greeting = "I'm leaning PHP!";

// Concatenates a variable & a string using variable substitution
echo "{$greeting}!!";

echo '<br />';

// Variable substitution
$name = 'John';
$subject = 'PHP';
echo "I'm {$name} and currently learning the {$subject} language.";

// Support special characters
echo "\n";
echo "\t-";
?>
  </pre>

  <!-- Difference between HTML <br /> from PHP string escape character "\n" -->
  <p>A first line of text. <?php echo '<br />' ?>A second line of text.</p>
  <p>A first line of text. <?php echo "\n" ?>A second line of text.</p>
</body>

</html>