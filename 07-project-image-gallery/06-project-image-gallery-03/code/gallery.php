<?php
include './inc/functions.inc.php';
include './inc/images.inc.php';

?>
<?php include './views/header.php'; ?>

<div class="gallery-container">
    <?php foreach ($imageTitles as $imageFilename => $imageTitle): ?>
        <a class="gallery-item" href="image.php?<?php echo http_build_query(['image' => $imageFilename]); ?>">
            <h3><?php echo e($imageTitle); ?></h3>
            <img src="./images/<?php echo rawurldecode($imageFilename); ?>" alt="<?php echo e($imageTitle); ?>">
        </a>
    <?php endforeach; ?>
</div>

<?php include './views/footer.php'; ?>