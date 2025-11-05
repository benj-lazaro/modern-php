<!-- From view page 'index.view.php' -->
<h1>List of cities:</h1>

<!-- Renders the content of the argument value array $entries -->
<ul>
    <?php foreach ($entries as $city): ?>
        <li>
            <a href="city.php?<?php echo http_build_query(['id' => $city->id]); ?>">
                <?php echo e($city->getCityWithCountry()); ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>

<!-- Render pagination 'prev' -->
<?php if ($pagination['page'] > 1): ?>
    <a href="index.php?<?php echo http_build_query(['page' => $pagination['page'] - 1]) ?>">Prev</a>
<?php endif; ?>

<!-- Render pagination 'next' -->
<?php if ($pagination['perPage'] * $pagination['page'] < $pagination['count']): ?>
    <a href="index.php?<?php echo http_build_query(['page' => $pagination['page'] + 1]) ?>">Next</a>
<?php endif; ?>