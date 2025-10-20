<h1>List of cities:</h1>

<!-- Render content of the mock model -->
<ul>
    <?php foreach ($entries as $city): ?>
        <li>
            <?php echo e($city->city); ?> (<?php echo e($city->country); ?>)
        </li>
    <?php endforeach; ?>

</ul>