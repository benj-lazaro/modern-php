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
    // Specifically retrieve data coming from the property 'results'
    $results = json_decode(file_get_contents("compress.bzip2://" . __DIR__ . "/../../data/" . $filename), true)['results'];

    // Aggregate data (i.e. raw stats) from property "parameter" with the value "pm25"
    $stats = [];
    foreach ($results as $result):
        if ($result['parameter'] !== "pm25") continue;
        // var_dump($result);

        // Get the year-month from property "local" w/in the property "date"
        $month = substr($result['date']['local'], 0, 7);

        // Check for pre-existing elements of the array "$stats"; re-initialize if none
        if (!isset($stats[$month])):
            $stats[$month] = [];
        endif;

        // Save the corresponding "pm25" value of the year-month
        $stats[$month][] = $result['value'];

    // var_dump($stats);
    // var_dump($month);
    // break;
    endforeach;

// var_dump($stats);

endif;

?>

<?php require __DIR__ . '/views/header.inc.php'; ?>

<?php if (empty($city)): ?>
    <p>The selected city could not be loaded.</p>
<?php else: ?>
    <?php if (!empty($stats)): ?>
        <table>
            <?php foreach ($stats as $month => $measurements): ?>
                <tr>
                    <th><?php echo e($month); ?></th>
                    <td><?php echo e(array_sum($measurements) / count($measurements)) ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>

<?php endif; ?>

<?php require __DIR__ . '/views/footer.inc.php'; ?>