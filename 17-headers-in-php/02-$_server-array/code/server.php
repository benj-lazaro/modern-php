<?php

// Sanitize user input & output
function e($value)
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

echo '<pre>';
// Get the site visitor's IP address
$visitorIP = $_SERVER["REMOTE_ADDR"];
echo "Site Visitor's IP Address: $visitorIP <br />";

// Browser requested page / script
$requestedPage = $_SERVER["REQUEST_URI"];
echo "Requested page/script: $requestedPage <br />";

// Differences between SCRIPT_NAME, PATH_INFO & PHP_SELF
$scriptName = $_SERVER["SCRIPT_NAME"];
echo "Script Name: $scriptName <br />";

if (!empty($_SERVER["PATH_INFO"])):
    $pathInfo = $_SERVER["PATH_INFO"];
    echo "Path Info: $pathInfo <br />";
endif;

$phpSelf = $_SERVER["PHP_SELF"];
echo "PHP Self: $phpSelf <br />";

// Request method in accessing the page
$requestMethod = $_SERVER["REQUEST_METHOD"];
echo "Request Method: $requestMethod <br />";

// Content of the Associative array $_SERVER
// var_dump($_SERVER);
echo '</pre>';

?>

<!-- Submit form data back to the executing PHP script -->
<form method="POST" action="<?php echo e($_SERVER["PHP_SELF"]); ?>">
    <input type="text" name="username">
    <input type="submit" value="Submit!">
</form>