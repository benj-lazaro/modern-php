<?php

// Sanitize user input/output
function e($value)
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

// Terms of agreement flag
$termsError = false;

// Check user submitted input
if ($_SERVER["REQUEST_METHOD"] === "POST"):
    // Check if user accepted the terms
    if (!empty($_POST['terms'])):
        // Save user info to the database
        // NOTE: Intentionally no code implemented

        // Redirect user to the 'thank you' page & terminate PHP script
        header("Location: thankyou.php");
        die();
    else:
        // Enable flag that user has NOT accepted the terms of agreement
        $termsError = true;
    endif;
endif;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="simple.css">
    <title>Document</title>
</head>

<body>
    <header>
        <h1>Sign up for the newsletter</h1>
    </header>

    <form method="POST" action="form.php">
        <label for="input_name">Your name:</label>
        <input type="text" name="name" id="input_name" value="<?php if (!empty($_POST["name"])) echo e($_POST["name"]) ?>">

        <label for="input_email">Your email:</label>
        <input type="text" name="email" id="input_email" value="<?php if (!empty($_POST["email"])) echo e($_POST["email"]) ?>">
        <br />

        <?php if (!empty($termsError)): ?>
            <p style="color: darkred;">You need to accept the terms!</p>
        <?php endif; ?>

        <input type="checkbox" name="terms" value="1" id="input_terms">
        <label for="input_terms">I have read the terms and want to receive emails</label>
        <br />

        <input type="submit" value="Submit!">
    </form>
</body>

</html>