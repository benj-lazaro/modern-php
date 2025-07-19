<?php require __DIR__ . '/inc/functions.inc.php';

// Fetch the $_GET parameter
$city = null;
if (!empty($_GET['city'])):
    $city = $_GET['city'];
endif;

// Load & decode the contents of index.json
$filename = null;
if (!empty($city)):
    $cities = json_decode(file_get_contents(__DIR__ . "/../../data/index.json"), true);

    // Iterate through index.json and find the selected city's bz2 file
    foreach ($cities as $currentCity):
        if ($currentCity['city'] === $city):
            $filename = $currentCity['filename'];
            break;
        endif;
    endforeach;
endif;

// Load the city's corresponding bz2 file
if (!empty($filename)):
    // Retreive ONLY the specific property 'results'
    $data = json_decode(file_get_contents("compress.bzip2://" . __DIR__ . "/../../data/" . $filename), true)['results'];

    var_dump($data);
endif;

?>

<?php require __DIR__ . '/views/header.inc.php'; ?>

<?php if (empty($city)): ?>
    <p>The selected city could not be loaded.</p>
<?php else: ?>

<?php endif; ?>

<?php require __DIR__ . '/views/footer.inc.php'; ?>