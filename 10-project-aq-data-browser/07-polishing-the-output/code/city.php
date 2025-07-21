<?php require __DIR__ . '/inc/functions.inc.php';

// Fetch the $_GET parameter
$city = null;
if (!empty($_GET['city'])):
    $city = $_GET['city'];
endif;

// Load & decode the contents of index.json
$filename = null;
$cityInformation = [];
if (!empty($city)):
    $cities = json_decode(file_get_contents(__DIR__ . "/../../data/index.json"), true);

    // Retrieve the values from properties "city" and "filename"
    foreach ($cities as $currentCity):
        if ($currentCity["city"] === $city):
            $filename = $currentCity["filename"];
            $cityInformation = $currentCity;
            break;
        endif;
    endforeach;
endif;

// Load & iterate through the city's corresponding bz2 file
if (!empty($filename)):
    // Specifically retrieve data from the property 'results'
    $results = json_decode(file_get_contents("compress.bzip2://" . __DIR__ . "/../../data/" . $filename), true)['results'];

    // Collect the units of measurement assigned to "pm25" & "pm10"
    $units = [
        "pm25" => null,
        "pm10" => null
    ];

    foreach ($results as $result):
        // Break the loop if the units of measurements have already been collected
        if (!empty($units["pm25"]) && !empty($units["pm10"])) break;

        // Collect corresponding measurement unit from the property "unit"
        if ($result["parameter"] === "pm25"):
            $units["pm25"] = $result["unit"];
        endif;

        if ($result["parameter"] === "pm10"):
            $units["pm10"] = $result["unit"];
        endif;
    endforeach;

    // Aggregate data (i.e. raw stats) from the property "parameter" with the value "pm25" & "pm10"
    $stats = [];
    foreach ($results as $result):
        // Skips data whose property "parameter" does not have "pm25" & "pm10" as value
        if ($result['parameter'] !== "pm25" && $result['parameter'] !== "pm10") continue;

        // Skip data whose property "value" contain a negative value (i.e. faulty/invalid data)
        if ($result['value'] < 0) continue;

        // Retrieve corresponding year-month from child property "local" of the parent property "date"
        $month = substr($result['date']['local'], 0, 7);

        // If an "pm25" and "pm10" entry have NOT yet been set for said year-month, initialize it
        if (!isset($stats[$month])):
            $stats[$month] = [
                "pm25" => [],
                "pm10" => []
            ];
        endif;

        // Save the correspoding "pm25" or "pm10" data to their corresponding "year-month" key
        $stats[$month][$result['parameter']][] = $result['value'];

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
    <h1><?php echo e($cityInformation['city']); ?> <?php echo e($cityInformation['flag']); ?></h1>

    <?php if (!empty($stats)): ?>
        <table>
            <thead>
                <tr>
                    <th>Month</th>
                    <th>PM 2.5 concentration</th>
                    <th>PM 10 concentration</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($stats as $month => $measurements): ?>
                    <tr>
                        <th><?php echo e($month); ?></th>
                        <td>
                            <?php echo e(round(array_sum($measurements['pm25']) / count($measurements['pm25']), 2)) ?>
                            <?php echo e($units["pm25"]); ?>
                        </td>

                        <td>
                            <?php echo e(round(array_sum($measurements['pm10']) / count($measurements['pm10']), 2)) ?>
                            <?php echo e($units["pm10"]); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>

        </table>
    <?php endif; ?>

<?php endif; ?>

<?php require __DIR__ . '/views/footer.inc.php'; ?>